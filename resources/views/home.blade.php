@extends('layouts.app')

@section('content')
        <div class="content">
            <div class="container-fluid">
             <div class="row">
                <div class="col-md-12">
                        <div class="card">
                        <br />
                        <h1 align="center"><b> {{ $intervalTime->format("%a DAYS TO GO!") }} </b></h1>
                        <br />
                        </div>
                </div>
             </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Current Outlets and Locations</h4>
                                <p class="category">Update: {{ $latestDB->date_stored }}</p>
                            </div>
                            <div class="content">
                            <?php $i = 0 ?>
                                @foreach($loc as $item)
                                    <p> {{ ++$i }}. {{ $item }} </p>
                                @endforeach
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> List of available outlets for paying and claiming race kits
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Information</h4>
                                <p class="category">Update: {{ $latestDB->date_stored }}</p>
                            </div>
                            <div class="content">
                                <p> No. of Runners: {{ $run }} </p>
                                <p> No. of Remarks: {{ $rem }} </p>
                                <p> No. of Runners (350): {{ $bronze }} </p>
                                <p> No. of Runners (500): {{ $Tf }} </p>
                                <p> *Race Category (For Completion): {{ $RC_FC }} </p>
                                <div class="footer">
                                                                       
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">List of Reports</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                <p> UNAVAILABLE! </p>
                                <b> 1. <a href={{ asset('reports/MASTER_MVR4_REG_LIST_DB.xlsx') }}>EXCEL MASTER DATABASE</a> <br />
                                2. <a href={{ asset('reports/MASTER_MVR4_REG_LIST_DB.xlsx') }}>GAVA REPORT</a> : UNAVAILABLE </b>
                                <div class="footer">
                                                                       
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">DATABASE : LIST OF RUNNERS</h4>
                                <p class="category">Update: {{ $latestDB->date_stored }}</p>
                            </div>
                            <br />
                            <div style="margin-left: 3px; margin-right: 3px;">
                            <table id="tbrunner" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                
                                    <tr>
                                        <th>No</th>
                                        <th>Registration Date</th>
                                        <th>Bronze No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Middle Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>School/Office/Organization</th>
                                        <th>Registration Category</th>
                                        <th>Race Category</th>
                                        <th>Singlet Size</th>
                                        <th>Mode of Payment</th>
                                        <th>RaceBib No</th>
                                        <th>Location</th>
                                        <th>Remarks</th>
                                    </tr>
                                
                                </thead>
                                <tbody>
                                    @foreach($connection as $item)
                                        <tr>
                                            <th>{{ $item->NO }}</th>
                                            <th>{{ $item->REGISTRATION_DATE }}</th>
                                            <th>{{ $item->BRONZE_NO }}</th>
                                            <th>{{ $item->FIRST_NAME }}</th>
                                            <th>{{ $item->LAST_NAME }}</th>
                                            <th>{{ $item->MIDDLE_NAME }}</th>
                                            <th>{{ $item->EMAIL }}</th>
                                            <th>{{ $item->MOBILE_NO }}</th>
                                            <th>{{ $item->SCHOOL_OFFICE_ORGANIZATION }}</th>
                                            <th>{{ $item->REGISTRATION_CATEGORY_500_350 }}</th>
                                            <th>{{ $item->RACE_CATEGORY_3K_5K }}</th>
                                            <th>{{ $item->SINGLET_SIZE }}</th>
                                            <th>{{ $item->MODE_OF_PAYMENT }}</th>
                                            <th>{{ $item->RACEBIB_NO }}</th>
                                            <th>{{ $item->REG_LOCATION }}</th>
                                            <th>{{ $item->REMARKS }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
</div>
                <!-- Modal Super User -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Super User</h4>
                          </div>
                          <div class="modal-body">
                              <form action="{{ url('/SuperUser') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <h3 align="center">PASSCODE: <input type="password" name="passdev"></h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Login</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>Million Volunteer Run 4!</b>"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
@endsection