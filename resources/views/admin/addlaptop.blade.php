@extends('admin.layouts.home')
@section('title', 'Thêm Laptop')
@section('main')
    <form action="{{ route("addlaptop") }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="mb-4 border-bottom border-3 border-danger">Thêm sản phẩm (Laptop)</h2>
        <div class="row">
            <div class="col border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Hãng sản xuất</h5>
                <div class="row p-2">
                <select class="form-select" aria-label="Default select example" name="brand" required>
                    <option selected disabled>Chose Brand</option>
                    @foreach ($brands as $item)
                        <option value="{{ $item->BrandID }}">{{ $item->Name }}</option>    
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Tên sản phẩm</h5>
                <div class="input-group mt-3">
                <input required name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Nhập tên sản phẩm" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="col border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Giá bán</h5>
                <div class="input-group mt-3">
                <input required name="price" type="text" class="form-control" placeholder="Nhập giá bán" aria-label="Nhập giá bán" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="col border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Ảnh chính</h5>
                <div class="row p-2">
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" name="image" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border rounded-2 p-3 m-3 shadow">
        <h5 class="border-bottom">Thông số kỹ thuật</h5>
        <div class="row m-1">
            <div class="col-4 p-1">
            <div><strong>Chip CPU</strong></div>
            <div class="input-group mb-3">
                <input required name="cpu" type="text" class="form-control" placeholder="Nhập CPU" aria-label="Nhập CPU" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Card GPU</strong></div>
            <div class="input-group mb-3">
                <input required name="gpu" type="text" class="form-control" placeholder="Nhập GPU" aria-label="Nhập GPU" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Dung lượng RAM</strong></div>
            <div class="input-group mb-3">
                <input required name="ram" type="text" class="form-control" placeholder="Nhập dung lượng RAM" aria-label="Nhập dung lượng RAM" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Dung lượng bộ nhớ</strong></div>
            <div class="input-group mb-3">
                <input required name="ssd" type="text" class="form-control" placeholder="Nhập dung lượng bộ nhớ" aria-label="Nhập dung lượng bộ nhớ" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Màn hình</strong></div>
            <div class="input-group mb-3">
                <input required name="screen" type="text" class="form-control" placeholder="Nhập thông tin màn hình" aria-label="Nhập thông tin màn hình" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Dung lượng Pin</strong></div>
            <div class="input-group mb-3">
                <input required name="pin" type="text" class="form-control" placeholder="Nhập dung lượng Pin" aria-label="Nhập dung lượng Pin" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Hệ diều hành</strong></div>
            <div class="input-group mb-3">
                <input required name="os" type="text" class="form-control" placeholder="Nhập hệ điều hành" aria-label="Nhập hệ điều hành" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Chất liệu</strong></div>
            <div class="input-group mb-3">
                <input required name="material" type="text" class="form-control" placeholder="Nhập chất liệu" aria-label="Nhập chất liệu" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Trọng lượng</strong></div>
            <div class="input-group mb-3">
                <input required name="weight" type="text" class="form-control" placeholder="Nhập trọng lượng" aria-label="Nhập trọng lượng" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Thời gian bảo hành</strong></div>
            <div class="input-group mb-3">
                <input required name="warranty" type="text" class="form-control" placeholder="Nhập thời gian bảo hành" aria-label="Nhập thời gian bảo hành" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Số lượng</strong></div>
            <div class="input-group mb-3">
                <input required name="quantity" type="text" class="form-control" placeholder="Nhập số lượng" aria-label="Nhập số lượng" aria-describedby="basic-addon2">
            </div>
            </div>
            <div class="col-4 p-1">
            <div><strong>Nổi bật</strong></div>
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected value="1">Yes</option>
                <option selected value="0">No</option>
            </select>
            </div>
        </div>
        </div>
        <div class="row border rounded-2 p-3 m-3 shadow">
            <h5 class="border-bottom">Thông tin về sản phẩm</h5>
            <div class="row m-1">
                <div class="col-5 p-1">
                    <div><strong>Thông tin nổi bật  </strong></div>
                    <div class="input-group mb-3">
                        <input name="descrip1" required type="text" class="form-control" placeholder="Thông tin 1" aria-label="Thông tin 1" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input name="descrip2" type="text" class="form-control" placeholder="Thông tin 2" aria-label="Thông tin 2" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input name="descrip3" type="text" class="form-control" placeholder="Thông tin 3" aria-label="Thông tin 3" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input name="descrip4" type="text" class="form-control" placeholder="Thông tin 4" aria-label="Thông tin 4" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input name="descrip5" type="text" class="form-control" placeholder="Thông tin 5" aria-label="Thông tin 5" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="col-7 p-1">
                    <div><strong>Thông tin chi tiết  </strong></div>
                    <div class="form-floating">
                        <textarea required class="p-2" name="detail" id="" placeholder="Nhập thông tin chi tiết của sản phẩm" style="width: 100%; height: 250px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row p-2">
            <div class="col">
                <div class="row border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Các phiên bản</h5>
                <div id="version_div">
                    <div class="input-group mb-3">
                    <input required name="version1" type="text" class="form-control" placeholder="Phiên bản 1" aria-label="Phiên bản 1" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div class=""><button type="button" class="btn btn-success" onclick="addVersion()">Thêm phiên bản</button></div>
                    <div class=""><button type="button" class="btn btn-warning" onclick="deleteVersion()">Xóa phiên bản</button></div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="row border rounded-2 p-3 m-3 shadow">
                <h5 class="border-bottom">Màu sắc</h5>
                <div id="color_div">
                    <div class="input-group mb-3">
                    <input required name="color1" type="text" class="form-control" placeholder="Màu sắc 1" aria-label="Màu sắc 1" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div class=""><button type="button" class="btn btn-success" onclick="addColor()">Thêm màu sắc</button></div>
                    <div class=""><button type="button" class="btn btn-warning" onclick="deleteColor()">Xóa màu sắc</button></div>
                </div>
                </div>
            </div>
            <input type="text" hidden value="2" name="versioncount" id="versioncount">
            <input type="text" hidden value="2" name="colorcount" id="colorcount">
            <script>
                let versionCount=2;
                let colorCount=2;
                function addVersion() {
                    const newInput = document.createElement('input');
                    newInput.type = 'text';
                    newInput.name = 'version' + versionCount;              
                    newInput.className='form-control';
                    newInput.placeholder='Phiên bản '+ versionCount;
                    newInput.required=true;

                    const inputContainer = document.createElement('div');
                    inputContainer.className = 'input-group mb-3';
                    inputContainer.id = 'version' + versionCount;
                    inputContainer.appendChild(newInput);

                    document.getElementById('version_div').appendChild(inputContainer);            
                    versionCount++;
                    document.getElementById('versioncount').value=versionCount;
                }
                function addColor() {
                    const newInput = document.createElement('input');
                    newInput.type = 'text';
                    newInput.name = 'color' + colorCount;              
                    newInput.className='form-control';
                    newInput.placeholder='Màu sắc '+ colorCount;
                    newInput.required=true;

                    const inputContainer = document.createElement('div');
                    inputContainer.className = 'input-group mb-3';
                    inputContainer.id = 'color' + colorCount;
                    inputContainer.appendChild(newInput);

                    document.getElementById('color_div').appendChild(inputContainer);            
                    colorCount++;
                    document.getElementById('colorcount').value=colorCount;
                }
                function deleteVersion(){
                if(versionCount>2){
                    --versionCount;
                    document.getElementById('versioncount').value=versionCount;
                    document.getElementById('version'+versionCount).remove();
                }
                }
                function deleteColor(){
                if(colorCount>2){
                    --colorCount;
                    document.getElementById('colorcount').value=colorCount;
                    document.getElementById('color'+colorCount).remove();
                }
                }
            </script>
        </div>
        <div class="row border rounded-2 p-3 m-3 shadow">
        <button type="submit" class="btn btn-outline-danger">Thêm sản phẩm</button>
        </div>
    </form>
@endsection