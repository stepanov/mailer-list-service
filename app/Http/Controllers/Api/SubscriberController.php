<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Return a paginated list of subscribers
     *
     * @return \App\Http\Resources\SubscriberResource
     */
    public function index()
    {
        $subscribers = Subscriber::latest()
            ->paginate(20);

        return SubscriberResource::collection($subscribers);
    }

    /**
     * Fetch and return a single subscriber
     *
     * @param Subscriber $subscriber to fetch
     * @return SubscriberResource
     */
    public function show(Subscriber $subscriber)
    {
        return new SubscriberResource($subscriber);
    }

    /**
     * Validate and add new subscriber
     *
     * @param Request $request to store
     * @return SubscriberResource
     */
    public function store(Request $request)
    {
        $subscriber = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::create($subscriber);

        return new SubscriberResource($subscriber);
    }
}
