@extends('admin.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Bookings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('bookings.index') }}">Bookings</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('bookings.index') }}">List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <h1>Bookings</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Booking Code</th>
                    <th>Total Price</th>
                    <th>People</th>
                    <th>Start Date</th>
                    <th>Payment Status</th>
                    <th>Tour Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->user_name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->booking_code }}</td>
                        <td>{{ number_format($booking->total_price, 0, '.', '.') }} VND</td>
                        <td>{{ $booking->people }}</td>
                        <td>{{ $booking->start }}</td>
                        <td>
                            {!! $booking->getNameStatusPayment() !!}

                        </td>
                        <td>
                            {!! $booking->getNameStatusTour() !!}

                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-item-btn showDetail" data-bs-toggle="modal"
                                data-bs-target="#showDetail" data-detail-id="{{ $booking->id }}">View</button>
                            {{-- @if ($booking->status_payment == 0 || $booking->status_tour == 0) --}}
                            <button class="btn btn-sm btn-warning edit-item-btn showEdit" data-bs-toggle="modal"
                                data-bs-target="#showModal" data-edit-id="{{ $booking->id }}">Edit</button>
                            {{-- @endif --}}


                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $bookings->links() }}
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div id="formEdit">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-lg" id="showDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="view">

            </div>
        </div>
    </div>
    </div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.showEdit').click(function() {
                let id = $(this).attr('data-edit-id');
                $.ajax({
                    url: "/admin/bookings/" + id + "/edit",
                    type: "GET",
                    success: function(data) {
                        let form = `
                    <form class="tablelist-form" autocomplete="off" action="{{ route('bookings.update') }}" method="post" >
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="${data.id}">
                        
                        <div class="modal-body">
                            <h5> Booking code: ${data.booking_code}
                        </h5>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Status Payment
                                </label>
                              <select name="status_payment" class="form-control">
                        <option value="0" ${data.status_payment ==0?'selected':'' }>Pending</option>
                        <option value="1" ${data.status_payment ==1?'selected':'' }>Paid</option>
                        <option value="2" ${data.status_payment ==2?'selected':'' }>Cancel</option>
                        <option value="3" ${data.status_payment ==3?'selected':'' }>Refund</option>
                                </select>
                                
                                
                            </div>
                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Status Tour
                                </label>
                              <select name="status_tour" class="form-control">
                        <option value="0" ${data.status_tour ==0?'selected':'' }>Waiting</option>
                        <option value="1" ${data.status_tour ==1?'selected':'' }>Done</option>
                        <option value="2" ${data.status_tour ==2?'selected':'' }>Cancel</option>

                                </select>
                                
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Update
                                    </button>
                            </div>
                        </div>
                    </form>`;
                        $('#formEdit').html(form);
                    },
                    error: function() {
                        console.log('Error');
                    }
                })


            });
            $('.showDetail').click(function() {
                let id = $(this).attr('data-detail-id');
                $.ajax({
                    url: "/admin/bookings/show/" + id,
                    type: "GET",
                    success: function(data) {
                        let form = `
                         <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Booking code: ${data.booking_code}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body ">

                    <div class="row">
                        <div class="col-12 row mb-3">
                            <div class="col-6">
                                <p>
                                    Name: <strong>${data.user_name}</strong>
                                </p>
                                <p>
                                    Email: <strong>${data.email}</strong>
                                </p>
                                <p>
                                    Phone: <strong>${data.phone}</strong>
                                </p>
                                <p>
                                    People: <strong>${data.people}</strong>
                                </p>
                               

                                <p>
                                    Total price: <strong>${data.total_price}</strong>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>Status Payment: ${data.statusPayment}</p>
                                <p>Status Tour: ${data.statusTour}</p>
                                 <div class="d-flex gap-2">
                                    <p>
                                        Date start: <strong>${data.start}</strong>
                                    </p>
                                    <p>
                                        Date end: <strong>${data.end}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row">

                            <div class="col-6">
                                <p for="customername-field" class="form-label">Tour Name: ${data.tour_name}
                                </p>
                                <p>
                                    Tour price: ${data.tour_price}
                                </p>
                                <p>
                                    Tour address: ${data.tour_address}
                                </p>
                            </div>
                            <div class="col-6">
                                <p for="customername-field" class="form-label">Hotel Name: ${data.hotel_name}
                                </p>
                                <p>
                                    Hotel price: ${data.hotel_price}
                                </p>
                                <p>
                                    Hotel address: ${data.hotel_address}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                       
                    </div>
                </div>`
                        $('#view').html(form);
                    }
                });
            });
        });
    </script>
@endsection
@endsection
