<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">
    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    <div class="col-sm-8">
        @include('admin::form.error')
        {{-- 这个style可以限制他的高度，不会随着内容变长 --}}
        <input type="file" id="{{$id}}"  onchange="aetherupload(this,'file').success(someCallback).upload()"/><!--需要有一个名为file的id，用以标识上传的文件，aetherupload(file,group)中第二个参数为分组名，success方法可用于声名上传成功后的回调方法名-->
        <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
            <div id="progressbar" style="background:blue;height:6px;width:0;"></div><!--需要有一个名为progressbar的id，用以标识进度条-->
        </div>
        <span style="font-size:12px;color:#aaa;" id="output"></span><!--需要有一个名为output的id，用以标识提示信息-->
        <input type="hidden" name="file1" id="savedpath" ><!--需要有一个名为savedpath的id，用以标识文件保存路径的表单字段，还需要一个任意名称的name-->
        @include('admin::form.help-block')
    </div>
</div>