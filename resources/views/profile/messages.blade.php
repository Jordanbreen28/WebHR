<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
    <table class="" style="width: 100%;border:1px solid #ccc">
    <tr>
      <th scope="col" align="center">From</th>
      <th scope="col" align="left">Subject</th>
      <th scope="col" align="left">Message</th>
      <th scope="col" align="left">Date sent</th>
    </tr>
      @foreach($messages as $message)
      <tr>
        <th scope="row">{{$sender_name->name}}</th>
        <td>{{$message->subject}}</td>
        <td>{{$message->message_contents}}</td>
        <td>{{$message->created}}</td>
      </tr>
      @endforeach
    </table>
</x-app-layout>
