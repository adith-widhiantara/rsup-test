<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="myTable" class="display">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: '/articles/data',
                    columns: [
                        {
                            data: 'title'
                        },
                        {
                            data: 'author.name'
                        },
                        {
                            render: function (data, type, row) {
                                return `<a href="/articles/${row.id}/edit" class="btn btn-primary">Edit</a>
                                        <form action="/articles/${row.id}" method="POST" style="display:inline;">
                                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>`;
                            }
                        }
                    ]
                });
            });
        </script>
    @endpush
</x-app-layout>
