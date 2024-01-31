<?php

namespace App\Services\Feedback;

/**
 * Interface FeedbackService
 *
 * @package App\Services\FeedbackService
 */
interface FeedbackService
{

    /**
     * Method to save user feedback
     *
     * @param array $feeedbackRequest
     *
     * @return mixed
     */
    public function saveFeedback(array $feeedbackRequest);

    /**
    * get all feedbacks feedback 
    *
    * @params SaveFeedbackRequest $saveFeedbackRequest
    *
    * @return @return mixed
    */
    public function getAllFeedback();

    /**
     * Method to save feedback comment
     *
     * @param array $commentRequest
     *
     * @return mixed
     */
    public function saveFeedbackComment(array $commentRequest);
}
