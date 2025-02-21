@extends('components.main')

{{-- @dd($dataF) --}}

{{-- @dd($album) --}}
@section('container')
    <section class="mx-10 my-8 md:mx-20 md:my-16">

        <div class="mb-6">
            <h1 class="text-4xl font-semibold">Report</h1>
        </div>

        <script src="{{ asset('asset/js/chart.js') }}"></script>
        <div class="my-4">
            <div class="grid md:grid-cols-5 gap-2 md:max-w-3xl mb-3">
                <div>
                    <select id="album"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">All Album</option>
                        @foreach ($album as $v)
                            <option value="{{ $v->id }}">{{ $v->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <div>
                        <select id="order"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Order By</option>
                            {{-- <option value="1">Upload</option> --}}
                            <option value="2">Like</option>
                            <option value="3">Comment</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <select id="sort"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Sort By</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button id="search" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">search</button>
                </div>

                <div>
                    <button id="export" type="button" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Export PDF</button>
                </div>
            </div>
            <canvas id="myChart"></canvas>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            like
                        </th>
                        <th scope="col" class="px-6 py-3">
                            comment
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">

                    </tr>
                </tbody>
            </table>
        </div>

        <div>

        </div>
    </section>

    <script>
        $(document).ready(function() {
            loadPhotoCards();
            $('#search').click(function() {
                getChartData();
                loadPhotoCards();
            });
            $('#export').click(function(e) {
                exportPDF(e);
            });
            $('#album-chart').change(function(e) {
                getChartData();
            });

            const ctx = document.getElementById('myChart').getContext('2d');

            var reportChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Likes',
                            data: [],
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.4
                        },
                        {
                            label: 'Comments',
                            data: [],
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Totals'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            getChartData();

            function updateChartData(chart, labels, dataLikes, dataComments) {
                const newType = labels.length === 1 ? 'bar' : 'line';

                if (chart.config.type != newType) {
                    chart.destroy();
                    reportChart = new Chart(ctx, {
                        type: newType,
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: 'Likes',
                                    data: dataLikes,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 2,
                                    fill: false,
                                    tension: 0.4
                                },
                                {
                                    label: 'Comments',
                                    data: dataComments,
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderWidth: 2,
                                    fill: false,
                                    tension: 0.4
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                }
                            },
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Months'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Totals'
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = dataLikes;
                    chart.data.datasets[1].data = dataComments;
                    chart.update();
                }
            }

            function getChartData(){
                $.ajax({
                    url: `{{ url('report/retrieve_chart') }}`,
                    data: {album: $('#album').val()},
                    method: 'GET',
                    success: function(response) {

                        const newLabels = response.data.labels;
                        const newDataLikes = response.data.likes;
                        const newDataComments = response.data.comments;

                        updateChartData(reportChart, newLabels, newDataLikes, newDataComments);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function loadPhotoCards() {
                var album = $('#album').val();
                var order = $('#order').val();
                var sort = $('#sort').val();

                $.ajax({
                    url: `{{ url('report/retrieve') }}`,
                    method: 'GET',
                    data: { album: album, order: order, sort: sort },
                    success: function(response) {
                        if (response) {
                            var tableContainer = $('#tbody');
                            var tableHtml=``;

                            tableContainer.empty();
                                response.data.album.forEach(function(table) {
                                    tableHtml += `
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                ${table.title}
                                            </th>
                                            <td class="px-6 py-4">
                                                ${table.photo_count}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${table.like_total}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${table.comment_total}
                                            </td>
                                        </tr>
                                    `;
                                });

                                tableHtml += `
                                        <tr class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                Total
                                            </th>
                                            <td class="px-6 py-4">
                                                ${response.data.photo_amount}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${response.data.like_amount}
                                            </td>
                                            <td class="px-6 py-4">
                                                ${response.data.like_amount}
                                            </td>
                                        </tr>
                                    `;
                                tableContainer.append(tableHtml);
                                initFlowbite();
                        } else {
                            console.log("No cards available or error with data.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            }

            function exportPDF(event){
                event.preventDefault();

                var url = "{{ url('report/download') }}" +
                    '?album=' + $('#album').val() +
                    '&order=' + $('#order').val() +
                    '&sort=' + $('#sort').val();
                window.location.href = url;
            }
        });
    </script>
@endsection
