<?php

namespace App\Notifications;

// use App\Models\Photo;
// use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NewLikeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $liker;
    protected $photo;

    public function __construct($liker, $photo)
    {
        Log::info('hai');
        $this->liker = $liker;
        $this->photo = $photo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        Log::info('Via method executed');
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        Log::info('hoi');

        return [
            'message' => $this->liker->name . ' liked your photo',
            'liker_id' => $this->liker->id,
            'photo_id' => $this->photo->id,
            'photo_title' => $this->photo->title ?? 'Photo',
            'time' => now()
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // public function toArray(object $notifiable): array
    // {
    //     Log::info('hoi');
    //     return [
    //         'message' => $this->liker->name . ' liked your photo',
    //         'liker_id' => $this->liker->id,
    //         'photo_id' => $this->photo->id,
    //         'photo_title' => $this->photo->title ?? 'Photo',
    //         'time' => now()
    //     ];
    // }
}
