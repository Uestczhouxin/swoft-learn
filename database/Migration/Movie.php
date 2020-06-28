<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class Movie
 *
 * @since 2.0
 *
 * @Migration(time=20200628161837)
 */
class Movie extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        //
        $this->schema->createIfNotExists('movie', function (Blueprint $blueprint) {
            $blueprint->bigIncrements('id');
            $blueprint->integer('isn')->comment('编号');
            $blueprint->string('name', 255)->comment('电影名称');
            $blueprint->integer('pubdate')->comment('发布年份');
            $blueprint->text('description')->comment('简介');
            $blueprint->float('score')->comment('评分');
            $blueprint->string('type', 255)->comment('类型');
            $blueprint->string('lable', 255)->comment('标签');
            $blueprint->integer('project_id')->comment('项目id');
            $blueprint->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {

    }
}
