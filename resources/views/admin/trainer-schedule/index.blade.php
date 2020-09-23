@extends('admin.layouts.app')
@section('title')
    Schedules List
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <!-- Batch Info -->
                    <div class="card direct-chat direct-chat-primary">

                        <div class="card-body">
                            <div style="height: 200px;padding: 10px;overflow-y: scroll;">
                                <h5><b>Bridging Divides to Strength Community</b></h5>
                                <div class="row form-group">
                                    <label for="gender" class="col-sm-2 col-form-label">Batch</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="batch_id">
                                            <option value="">Select One</option>
                                            <option value="Batch">Batch</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Start Date:22/12/2020</b></p>
                                    </div>

                                </div>
                                <p style="font-size: 14px">
                                    A paragraph is a series of related sentences developing a central idea, called the
                                    topic. Try to think about paragraphs in terms of thematic unity: a paragraph is a
                                    sentence or a group of sentences that supports one central, unified idea. Paragraphs
                                    add one idea at a time to your broader argument.
                                    A paragraph is a series of related sentences developing a central idea, called the
                                    topic. Try to think about paragraphs in terms of thematic unity: a paragraph is a
                                    sentence or a group of sentences that supports one central, unified idea. Paragraphs
                                    add one idea at a time to your broader argument.
                                </p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!--/.Batch Info -->
                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-primary">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Is this template really for free? That's unbelievable!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Working with AdminLTE on a great new app! Wanna join?
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        I would love to.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                                                <span class="contacts-list-msg">I will be waiting for...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Where is your new...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Can I take a look at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Never mind I found...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                           class="form-control">
                                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <div class="col-5">
                    <!-- Batch Info -->
                    <div class="card direct-chat direct-chat-primary">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="height: 235px;padding: 10px;overflow-y: scroll;">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td>Participants(21)</td>
                                        <td>Attendance</td>
                                        <td>Chat</td>
                                        <td>Upload</td>

                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>Abdel Al Kareem</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>Abdel Al Kareem</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <td>Abdel Al Kareem</td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                        <td><input type="checkbox"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!--/.Batch Info -->
                    <!-- Batch Info -->
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h5 class="card-title">Files Uploaded by Participants</h5>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="height: 230px;padding: 10px;overflow-y: scroll;">

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!--/.Batch Info -->
                </div>
            </div>
            <!-- /.row -->
<div class="row">
    <div class="col-12">

        <button style="margin: 10px;" class="btn btn-sm active-color float-right" data-toggle="modal"
                data-target="#modal-sm">
            Create Exam
        </button>
        <button style="margin: 10px; background-color: black;color: white;" class="btn btn-sm float-right" >
            Upload File
        </button>
    </div>
</div>
        </div><!-- /.container-fluid -->
        <!-- modal -->
        <div class="modal fade" id="modal-sm">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #6c757d2b;color: black;">
                        <h5 class="modal-title">Create Exam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row form-group">
                          <h5>Bridging Divides to Strength Community</h5>
                        </div>
                        <div class="row form-group">
                            <label for="gender" class="col-sm-3 col-form-label">Batch</label>
                            <div class="col-sm-9">
                                <p>Appollo 11</p>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">Exam Date</label>
                            <div class="col-sm-9">
                                <div class="input-group date" id="reservationdate"
                                     data-target-input="nearest">
                                    <input type="text" name="date" class="form-control datetimepicker-input"
                                           data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="starttimepicker" class="col-sm-3 col-form-label">Start Time</label>
                            <div class="col-sm-3">
                                <div class="bootstrap-timepicker">
                                    <div class="input-group date" id="starttimepicker" data-target-input="nearest">
                                        <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#starttimepicker">
                                        <div class="input-group-append" data-target="#starttimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <label for="endtimepicker" class="col-sm-3 col-form-label">End Time</label>
                            <div class="col-sm-3">
                                <div class="input-group date" id="endtimepicker" data-target-input="nearest">
                                    <input type="text" name="end_time" class="form-control datetimepicker-input"
                                           data-target="#endtimepicker"/>
                                    <div class="input-group-append" data-target="#endtimepicker"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row form-group">
                            <label for="gender" class="col-sm-3 col-form-label">Exam Title</label>
                            <div class="col-sm-9">
                               <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="gender" class="col-sm-5 col-form-label">Google Form Link</label>
                            <div class="col-sm-7">
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: black;color: white;" class="btn btn-default"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" style="background-color: #0D5245;color: white;" class="btn btn-default">
                            Submit
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
@endsection
@section('script')

@endsection
@push('script-bottom')
    <script>
        $(function () {
            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            //Timepicker
            $('#starttimepicker').datetimepicker({
                format: 'LT'
            });
            //Timepicker
            $('#endtimepicker').datetimepicker({
                format: 'LT'
            });
            // The Calender
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            });
        })
    </script>
@endpush
