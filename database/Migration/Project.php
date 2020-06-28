<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class ProjectController
 *
 * @since 2.0
 *
 * @Migration(time=20200628161855)
 */
class Project extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('project', function (Blueprint $blueprint) {
            $blueprint->bigIncrements('id');
            $blueprint->string('name', 255)->comment('项目名称');
            $blueprint->text('description')->comment('项目描述');
            $blueprint->timestamps();
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('project');
    }
}
