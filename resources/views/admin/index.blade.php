@extends('components.main')


@section('container')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Pending Registrations</h1>

        <div class="mx-auto">
            <div class="bg-white rounded-lg shadow overflow-hidden w-full">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="text-center">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($data as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Form Approve -->
                                    <form method="POST" action="{{ url('admin', $user->id) }}" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value=1>
                                        <button type="submit"
                                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 mr-2">
                                            Approve
                                        </button>
                                    </form>

                                    <!-- Form Reject -->
                                    <form method="POST" action="{{ url('admin/', $user->id) }}" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value=0>
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Reject
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
