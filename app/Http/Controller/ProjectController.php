<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Model\Entity\Project;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Exception;

/**
 * Class ProjectController
 * @package App\Http\Controller
 * @Controller(prefix="/project")
 */
class ProjectController
{
    /**
     * @RequestMapping()
     */
    public function index()
    {
        $data = Project::get();
        return success($data);
    }

    /**
     * @RequestMapping(route="{id}")
     */
    public function get(int $id)
    {
        $data = Project::findOrFail($id);
        return success($data);
    }

    /**
     * @RequestMapping(route="post")
     */
    public function store(Request $request)
    {
        $data    = $request->input();
        $project = Project::create($data);
        if (!$project->save()) {
            throw new Exception('添加失败');
        }
        return success([], '添加成功');
    }

    /**
     * @RequestMapping(route="post/{id}")
     */
    public function update(Request $request, int $id)
    {
        $project = Project::findOrFail($id);
        $data    = $request->input();
        $project->fill($data);
        if (!$project->save()) {
            throw new Exception('修改失败');
        }
        return success([], '修改成功');
    }

    /**
     * @RequestMapping(route="del/{id}")
     */
    public function del(int $id)
    {
        if (!Project::where('id', $id)->delete()) {
            throw new Exception('删除失败');
        }
        return success([], '删除成功');
    }
}
