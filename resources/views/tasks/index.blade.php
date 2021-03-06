@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    @if (Auth::check())
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ステータス</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                            <th>{{ $task->status }}</th>
                            <th>{{ $task->content }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
    
    @if (Auth::check())
        {{--タスク作成ページへのリンク--}}
        {!! link_to_route("tasks.create", "新規タスクの登録", [],["class" => "btn btn-primary"]) !!}
        {{-- ログアウトへのリンク --}}
        {!! link_to_route("logout.get", "ログアウト", [],["class" => "btn btn-primary"]) !!}
    @else
        {{--ユーザ登録ページへのリンク--}}
        {!! link_to_route("signup.get", "サインアップ", [],["class" => "btn btn-primary"]) !!}
        {{-- ログインページへのリンク --}}
        {!! link_to_route("login", "ログイン", [],["class" => "btn btn-primary"]) !!}
    @endif
@endsection