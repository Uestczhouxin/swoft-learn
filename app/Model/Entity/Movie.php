<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class Movie
 *
 * @since 2.0
 *
 * @Entity(table="movie")
 */
class Movie extends Model
{
    /**
     * 
     *
     * @Column(name="created_at", prop="createdAt")
     *
     * @var string|null
     */
    private $createdAt;

    /**
     * 简介
     *
     * @Column()
     *
     * @var string
     */
    private $description;

    /**
     * 
     * @Id()
     * @Column()
     *
     * @var int
     */
    private $id;

    /**
     * 编号
     *
     * @Column()
     *
     * @var int
     */
    private $isn;

    /**
     * 标签
     *
     * @Column()
     *
     * @var string
     */
    private $lable;

    /**
     * 电影名称
     *
     * @Column()
     *
     * @var string
     */
    private $name;

    /**
     * 项目id
     *
     * @Column(name="project_id", prop="projectId")
     *
     * @var int
     */
    private $projectId;

    /**
     * 发布年份
     *
     * @Column()
     *
     * @var int
     */
    private $pubdate;

    /**
     * 评分
     *
     * @Column()
     *
     * @var float
     */
    private $score;

    /**
     * 类型
     *
     * @Column()
     *
     * @var string
     */
    private $type;

    /**
     * 
     *
     * @Column(name="updated_at", prop="updatedAt")
     *
     * @var string|null
     */
    private $updatedAt;


    /**
     * @param string|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $isn
     *
     * @return self
     */
    public function setIsn(int $isn): self
    {
        $this->isn = $isn;

        return $this;
    }

    /**
     * @param string $lable
     *
     * @return self
     */
    public function setLable(string $lable): self
    {
        $this->lable = $lable;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int $projectId
     *
     * @return self
     */
    public function setProjectId(int $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * @param int $pubdate
     *
     * @return self
     */
    public function setPubdate(int $pubdate): self
    {
        $this->pubdate = $pubdate;

        return $this;
    }

    /**
     * @param float $score
     *
     * @return self
     */
    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIsn(): ?int
    {
        return $this->isn;
    }

    /**
     * @return string
     */
    public function getLable(): ?string
    {
        return $this->lable;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    /**
     * @return int
     */
    public function getPubdate(): ?int
    {
        return $this->pubdate;
    }

    /**
     * @return float
     */
    public function getScore(): ?float
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

}
