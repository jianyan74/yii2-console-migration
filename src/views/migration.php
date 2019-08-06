<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */
/* @var $table string the name table */
/* @var $fields array the fields */

echo "<?php\n";
?>

use yii\db\Migration;

class <?= $className ?> extends Migration
{
    public function up()
    {
<?= $up ?>
    }

    public function down()
    {
<?php if (!empty($down)):?>
<?= $down ?>
<?php else:?>
echo "<?= $className ?> cannot be reverted.\n";
<?php endif;?>
    }
}

