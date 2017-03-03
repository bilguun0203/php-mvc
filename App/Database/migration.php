<code><?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:45 AM
 */

require_once 'autoload.php';

/**
 * Өгөгдлийн санд хүснэгт үүсгэх, засах, устгах үүргийг хялбар
 * бөгөөд үечилсэн байдлаар удирдах боломжийг олгох функц
 *
 * Файл үүсгэх дүрэм:
 * 	<дугаар>_<үйлдэл>_<хүснэгтийн нэр>.php
 * 	Жишээ нь:
 * 		001_create_users.php - Users нэртэй хүснэгт үүсгэх
 * 		002_alter_users.php - Users нэртэй хүснэгтэнд өөрчлөлт оруулах
 * 	Файл нь заавал класс байх бөгөөд файлын нэрийн дугаараас хойшхи үгс орсон байна.
 * 	Жишээ нь:
 * 		001_create_users.php файлын класс Create_Users
 * 	Классын дотор үндсэн 2 функц байх ба статикаар тодорхойлогдсон байна.
 * 		@function up() - Үндсэн үйлдэл
 * 		@function down() - Үйлдэл буцаалт
 *
 * Файлын дугаар ажиллуулах дараалсан дэс дугаар байх ба үйлдлийн дараалал тухайн дугаараар явагдана.
 * Аль хэсэг хүртэл ажиллуулахыг @var $migration_count -д зааж өгнө.
 */

$migration_count = 2;

/**
 * @var $directory - Өгөгдлийн сангийн файл байрлах хавтас
 */
$directory = '.';
/**
 * @var $blacklist - Тухайн хавтсан холбоогүй файлын жагсаалт
 */
$blacklist = array(
	'..',
	'.',
	basename(__FILE__),
	'autoload.php',
	'000_create_migration.php'
);
/**
 * @var $migration_files - Хавтсан дахь $blacklist хувьсагчид байгаас бусад файлыг хадгалж авна
 */
$migration_files = array_diff(scandir($directory), $blacklist);

$model = new \App\Model\Model();

/**
 * Migration бүртгэлийн хүснэгт үүсгэх
 */
if($model->db->tableExists('migration') != 1) {
	require_once '000_create_migration.php';
	App\Database\Create_Migration::up();
	echo "Created <strong>'Migration'</strong> Table<br>";
}

/**
 * Migration файлуудыг нэг нэгээр шалган тохирох функцыг дуудан ажиллуулна.
 */
$i = 0;
foreach ($migration_files as $item) {
	$i++;
	require_once $item;
	/**
	 * Файлын өргөтгөлийг устгаж класс, хүснэгтийн нэрийг хадгална
	 */
	$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $item);
	$withoutExt = explode('_', $withoutExt);
	$className = '';
	$tableName = '';
	$alter = '000';
	foreach ($withoutExt as $key => $section) {
		if($key != 0){
			$className .= ucfirst($section) . '_';
		}
		if($key > 1){
			$tableName .= $section . '_';
		}
		if($key == 1 && $section == 'alter'){
			$alter = $withoutExt[0];
		}
	}
	$className = rtrim($className, '_');
	$tableName = rtrim($tableName, '_');

	/**
	 * Файлын дугаар $migration_count -аас хэтэрвэл @function down() -ыг дуудаж бүртгэлийн хүснэгтээс хасна.
	 * Хэрэв хүснэгт үүссэн бүртгэлийн хүснэгтэнд байвал хүснэгтээс хасаад хүснэгт байвал устгана!
	 */

	/**
	 * Migration хүснэгтэнд байгаа эсэхийг тогтооно
	 */
	$model->db->where('migration', $tableName);
	if($alter != '000'){
		$model->db->where('edit', $alter);
	}
	$row = $model->db->getOne('migration');
	if($i > $migration_count){
		/**
		 * Migration хүснэгтэнд байвал үйлдлийг гүйцэтгэнэ
		 */
		if($row != null || is_array($row)) {
			if($model->db->tableExists($tableName) == 1) {
				call_user_func("\\App\\Database\\$className::down");
			}
			$model->db->where('id', $row['id']);
			$model->db->delete('migration');
			echo "Executed <strong>'$className::down()'</strong><br>";
		}
	} /**
	 * Файлын дугаар $migration_count дотор байвал @function up() -ыг дуудаж бүртгэлийн хүснэгтэнд нэмнэ.
	 * Хэрэв хүснэгт үүсээгүй бөгөөд бүртгэлийн хүснэгтэнд байвал хэрэгжүүлнэ!
	 */
	else {
		/**
		 * 1. Migration хүснэгтэнд байхгүй бөгөөд хүснэгт үүсээгүй байх үед
		 * 2. Migration хүснэгтэнд байхгүй, хүснэгт үүссэн бөгөөд засварлах үед
		 */
		if(((!is_array($row) || $row == null) && $model->db->tableExists($tableName) != 1) || ((!is_array($row) || $row == null) && $model->db->tableExists($tableName) == 1 && $alter != '000')){
			call_user_func("\\App\\Database\\$className::up");
			$data = array(
				'migration' => $tableName,
				'edit' => $alter
			);
			$model->db->insert('migration', $data);
			echo "Executed <strong>'$className::up()'</strong><br>";
		}
	}
}



?>
</code>
