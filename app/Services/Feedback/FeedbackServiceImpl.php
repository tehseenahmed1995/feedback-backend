<?php

namespace App\Services\Feedback;

use App\Repositories\Feedback\FeedbackRepository;
use App\Services\Feedback\FeedbackService;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * class FeedbackServiceImpl
 *
 * @package App\Services\FeedbackServiceImpl
 */
class FeedbackServiceImpl implements FeedbackService {

    public function __construct(private FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Method to save user feedback
     *
     * @param array $feeedbackRequest
     *
     * @return mixed
     */
    public function saveFeedback(array $feedbackRequest)
    {
        try {
            return $this->feedbackRepository->create(array_merge($feedbackRequest, ['user_id' => auth()->user()->id]));
        } catch(Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There is error in feedback submission: ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));
            return false;
        }
    }

    /**
    * get all feedbacks feedback 
    *
    * @params SaveFeedbackRequest $saveFeedbackRequest
    *
    * @return @return mixed
    */
    public function getAllFeedback()
    {
        try {
            return $this->feedbackRepository->getAllFeedbackWithPagination(['user', 'comments', 'comments.user']);
        } catch(Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There is error in feedback submission: ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));
            return false;
        }
    }

    /**
     * Method to save feedback comment
     *
     * @param array $commentRequest
     *
     * @return mixed
     */
    public function saveFeedbackComment(array $commentRequest)
    {
        try {
            return $this->feedbackRepository->createComment(array_merge($commentRequest, ['comment_by' => auth()->user()->id]));
        } catch(Exception $exception) {
            Log::error(json_encode(
                [
                    "message" => 'There is error in comments submission: ' . $exception->getMessage(),
                    "trace" => $exception->getTraceAsString()
                ],
                JSON_THROW_ON_ERROR
            ));
            return false;
        }
    }
}