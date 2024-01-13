<x-mail::message>
# Idea Status Updated

The idea: {{$idea->title}}<br>
has been updated to the status of

{{$idea->status->name}}

<x-mail::button :url="route('idea.show', $idea->slug)">
View Idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
