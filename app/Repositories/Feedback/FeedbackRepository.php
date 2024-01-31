<?php

namespace App\Repositories\Feedback;

use App\Exceptions\InvalidDataException;
use App\Models\Comment;
use App\Models\Feedback;

/**
 * Class FeedbackRepository
 *
 * @package App\Repositories
 */
class FeedbackRepository
{
    /**
     * create or update user details
     *
     * @param $data
     *
     * @return mixed
     */
    public function create($data)
    {
        return Feedback::create($data);
    }

    /**
     * create or update user details
     *
     * @param $data
     *
     * @return mixed
     */
    public function createComment($data)
    {
        return Comment::create($data);
    }

    /**
     * get all feedbacks
     *
     * @param array $relation
     *
     * @return mixed
     */
    public function getAllFeedbackWithPagination(array $relation = [])
    {
        $page = request()->query('page', 1);
        $perPage = request()->query('per_page', 10);
        return Feedback::with($relation)->paginate($perPage, ['*'], 'page', $page);
    }
}