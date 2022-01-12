<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body style="background:brown;color:white;">
        <center>
            <h1>To Do List</h1>
            </br>
            <h2>Current Items:</h2>

            @foreach($listItems as $listItem)
                <p>Item: {{ $listItem->name }}</p>
                <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-chartset="UTF-8">
                    {{ csrf_field() }}
                    <button type="submit">Mark as Complete</button>
                </form>
                <form method="post" action="{{ route('deleteItem', $listItem->id) }}" accept-chartset="UTF-8">
                    {{ csrf_field() }}
                    <button type="submit">Delete</button>
                </form>
                <form method="post" action="{{ route('updateItem') }}" accept-chartset="UTF-8">
                    {{ csrf_field() }}
                    <input type="text" name="listItemUpdate">
                    <input type="hidden" value="{{ $listItem->id }}" name="id">
                    <button type="submit">Update</button>
                </form>
            @endforeach

            </br>
            <form method="post" action="{{ route('saveItem') }}" accept-chartset="UTF-8">
                {{ csrf_field() }}

                <h2><label for="listItem">New Todo Item</label></h2>
                <input type="text" name="listItem">
                <button type="submit">save item</button>

            </form>
        </center>
    </body>
</html>