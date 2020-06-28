<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class Article
 *
 * @since 2.0
 *
 * @Migration(time=20200628163354)
 */
class Article extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        //
        $this->schema->createIfNotExists('article', function(Blueprint $blueprint) {
            $blueprint->bigIncrements('id');
            $blueprint->integer('isn')->comment('编号');
            $blueprint->string('title')->comment('标题');
            $blueprint->string('cover')->comment('封面图');
            $blueprint->mediumText('content')->comment('文章内容');
            $blueprint->string('url')->comment('链接');
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
