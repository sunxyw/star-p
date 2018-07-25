@extends('layouts.app')

@section('title', '新建项目')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">项目名称</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="sync">
                            <label class="custom-control-label" for="sync">同时提交审核</label>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-2">提交</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">
                    项目条款
                </h5>
                <div class="card-body">
                    <ul>
                        <li>您的项目版权归您所有，但我们可以展示以及分享您的项目。</li>
                        <li>您需要对您的项目负责，并承担一切法律责任。</li>
                        <li>如有需要，我们有权删除项目或封禁您的账户。</li>
                    </ul>

                    <small class="text-muted">
                        如没有特别注明，您在本站所做的一切行为及发布的项目均受中华人民共和国相关法律及《中华人民共和国网络安全法》之管辖和约束。另外，如果本条款中的部分条款被有关机关认定为无效，则此无效部分并不影响本条款其他部分的效力，其他部分仍然有效。
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection