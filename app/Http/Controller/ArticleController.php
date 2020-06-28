<?php


namespace App\Http\Controller;

use App\Model\Entity\Article;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class ArticleController
 * @package App\Http\Controller
 * @Controller(prefix="/article")
 */

class ArticleController
{
    /**
     * @RequestMapping(route="index")
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $data = Article::paginate($page, $size);
        return success($data);
    }

    /**
     * @RequestMapping(route="{id}")
     */
    public function get(int $id)
    {
        $data = Article::findOrFail($id);
        return success($data);
    }
}
