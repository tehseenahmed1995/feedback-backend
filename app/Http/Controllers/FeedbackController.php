<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackCommentRequest;
use App\Http\Requests\SaveFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Services\Feedback\FeedbackService;
use App\Utils\ResponseUtil;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function __construct(private  FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    /**
    * get all feedbacks feedback 
    *
    * @params SaveFeedbackRequest $saveFeedbackRequest
    *
    * @return @return FeedbackResource
    */
    public function list()
    {
        return FeedbackResource::collection($this->feedbackService->getAllFeedback());  
    }

    /**
    * save feedback 
    *
    * @params SaveFeedbackRequest $saveFeedbackRequest
    *
    * @return @return mixed
    */
    public function store(SaveFeedbackRequest $saveFeedbackRequest)
    {
        $response = $this->feedbackService->saveFeedback($saveFeedbackRequest->validated());
        if(!empty($response)) {
           return ResponseUtil::successWithMessage('Feedback submitted Successfully', 'feedback_save', 201);
        }
        return ResponseUtil::errorWithMessage('There is error in feedback submission', 'feedback_error');
    }

    /**
    * add comment of feedback 
    *
    * @params FeedbackCommentRequest $feedbackCommentRequest
    *
    * @return @return mixed
    */
    public function addComment(FeedbackCommentRequest $feedbackCommentRequest)
    {
        $response = $this->feedbackService->saveFeedbackComment($feedbackCommentRequest->validated());
        if(!empty($response)) {
           return ResponseUtil::successWithMessage('Feedback comment added Successfully', 'feedback_save', 201);
        }
        return ResponseUtil::errorWithMessage('There is error in feedback comment submission', 'feedback_error');
    }
}
