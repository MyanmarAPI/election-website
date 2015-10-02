<table class="bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
            <th>Screenshots</th>
            <th>Icon Image</th>
            <th>Owner</th>
            <th width="250px">Actions</th>
        </tr>                   
    </thead>

    @foreach ( $apps as $app)

    <tr>
        <td>{{ $app->name }}</td>
        <td>{{ $app->type }}</td>
        <td>
            @if ($app->alreadyPublished())
                <span class="green-text text-darken-2">Published</span>
            @elseif ($app->published == 'p')
                <span class="blue-text text-darken-2">Ready to Publish</span>
            @else
                <span class="red-text text-darken-2">Draft</span>
            @endif
        </td>
        <td>{{ count($app->screenshots) }}</td>
        <td>
            @if (is_null($app->icon))
                <i class="material-icons red-text" title="Require Icon Image">error_outline</i>
            @else
                <i class="material-icons green-text" title="Icon Image Is Ok">done</i>
            @endif
        </td>
        <td>{{ $app->user->name }}</td>
        <td>     
            <a title="Edit" href="{{ route('showcase.edit', $app->id) }}" 
            class="waves-effect waves-light btn indigo">
                <i class="material-icons">open_in_new</i>
            </a>

            @if ($app->alreadyPublished())
                <a title="Deactivate" href="{{ route('action.showcase.deactivate', $app->id) }}" 
                class="waves-effect waves-light btn red">
                    <i class="material-icons">visibility_off</i>
                </a>
            @elseif ($app->published == 'p')
                <a title="Activate" href="{{ route('action.showcase.activate', $app->id) }}" 
                class="waves-effect waves-light btn green">
                    <i class="material-icons">visibility</i>
                </a>
            @else
                <a title="Not Ready To Publish" href="#" 
                class="btn disabled">
                    <i class="material-icons">visibility</i>
                </a>
            @endif
        </td>
    </tr>

    @endforeach
    
</table>