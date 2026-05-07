<x-mail::message>
# Create new Article

{{$article->title}}

<x-mail::button :url="$url">
Open article
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
