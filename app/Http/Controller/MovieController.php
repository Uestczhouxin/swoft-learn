<?php


namespace App\Http\Controller;

use App\Model\Entity\Movie;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class MovieController
 * @package App\Http\Controller
 * @Controller(prefix="/movie")
 */
class MovieController
{
    /**
     * @RequestMapping(route="index")
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $data = Movie::paginate($page, $size);
        return success($data);
    }

    /**
     * @RequestMapping(route="{id}")
     */
    public function get(int $id)
    {
        $data = Movie::findOrFail($id);
        return success($data);
    }
}
