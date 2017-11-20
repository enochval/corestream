@extends('layouts.app-light')

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card wizard-content">
                <div class="card-block wizard-content">
                    <h4 class="card-title">Please fill out this form to create an event </h4>
                    <form action="#" class="tab-wizard wizard-circle form-material">
                        <!-- Step 1 -->
                        <h6>Category</h6>
                        <section>
                            <div class="col-md-6 m-auto">
                                <h5 class="m-t-30 m-b-10">Select box</h5>
                                <select class="selectpicker" data-style="form-control btn-secondary">
                                    <option>Mustard</option>
                                    <option>Ketchup</option>
                                    <option>Relish</option>
                                </select>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Title</h6>
                        <section>
                            <div class="form-group m-auto col-md-6">
                                <input type="text" class="form-control form-control-line" value="">
                                <label class="eventlabel">Title</label>
                            </div>
                        </section>
                        <!--step 3-->
                        <h6>Description</h6>
                        <section>
                            <div class="form-group m-auto col-md-6">
                                <input type="text" class="form-control form-control-line" value="">
                                <label>Give a Description</label>
                            </div>
                        </section>
                        <!--step 4-->
                        <h6>Schedule</h6>
                        <section>
                            <div class="form-group m-auto col-md-6">
                                <input type="text" class="form-control form-control-line" value="">
                                <label>Date and time</label>
                            </div>
                        </section>
                        <!-- Step 5 -->
                        <h6>Type</h6>
                        <section>
                            <div class="form-group m-auto col-md-6">
                                <input type="text" class="form-control form-control-line" value="">
                                <label>Event Type</label>
                            </div>
                        </section>
                        <!-- Step 6 -->
                        <h6>Image</h6>
                        <section>
                            <div class="form-group m-auto col-md-6">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Upload Image" name="submit">
                                    Select image to upload:
                                </form>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection