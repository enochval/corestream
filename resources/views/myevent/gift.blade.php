@extends('layouts.app-light')
@section('content')
    <div class="giveGift">
        <div class="card card-outline-danger">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Give A Gift</h4>
            </div>
            <div class="card-block">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="">
                                        <small class="form-control-feedback"> </small> </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Gift Type</label>
                                    <div class="col-md-9">
                                        <div class="radio-list" id="gift">
                                            <label class="custom-control custom-radio moneyTransfer">
                                                <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Perishable</span>
                                            </label>
                                            <label class="custom-control custom-radio others">
                                                <input id="radio0" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Non-perishable</span>
                                            </label>
                                        </div>
                                        <small class="form-control-feedback">  </small> </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row  gift">
                                    <label class="control-label text-right col-md-3 ">Category</label>
                                    <div class="col-md-9">
                                        <div class="radio-list">
                                            <label class="custom-control custom-radio">
                                                <input id="radio3" name="radio" type="radio" checked="" class="custom-control-input" data-toggle="modal" data-target="#responsive-modal">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Call-Card</span>
                                            </label>
                                            <label class="custom-control custom-radio ">
                                                <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Money-transfer</span>
                                            </label>
                                            <label class="custom-control custom-radio others">
                                                <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Others</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="{{ url('/manage-event') }}" type="submit" class="btn btn-danger">Send</a>
                                        <a class="btn btn-inverse" href="{{ url('/manage-event') }}">cancel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Send a Call card</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Enter PIN:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Transfer your Money</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Enter PIN:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection