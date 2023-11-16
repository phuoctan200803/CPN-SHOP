<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <form action="?mod=categories&act=add" method="post" enctype="multipart/form-data">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="app-categories-list.html">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Category
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit Category</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <input type="submit" value="Save" name="sub_categories" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">
                                            Thông tin danh mục
                                        </h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Tên danh mục</label><input
                                            type="text" class="form-control" id="form-category/name" value=""
                                            name="category_name" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="form-category/description" class="form-label">Mô tả</label>

                                        <textarea id="form-product/description" class=" form-control" rows="8"
                                            name="category_description"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5" hidden>
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Số lượng sản phẩm</h2>
                                    </div>

                                    <div>
                                        <!-- <label for="form-product/quantity" class="form-label">Stock
                                            quantity</label> -->
                                        <input type="number" class="form-control" id="form-product/quantity"
                                            name="product_quantity" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">
                                            Ưu tiên hiển thị
                                        </h2>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-check"><input type="radio" class="form-check-input"
                                                name="status" value="Hiển thị" checked="" />
                                            <span class="form-check-label">Hiển thị</span>
                                        </label>
                                        <label class="form-check">
                                            <input type="radio" class="form-check-input" name="status"
                                                value="lên kế hoạch" />
                                            <span class="form-check-label">Lên kế hoạch</span></label>
                                        <label class="form-check mb-0">
                                            <input type="radio" class="form-check-input" name="status"
                                                value="Ẩn" /><span class="form-check-label">Ẩn</span></label>
                                    </div>

                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">
                                                    Image
                                                </h2>
                                            </div>
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="mt-4 mb-n2 ">
                                                    <input type="file" name="anh" class="form-controller">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
<!-- sa-app__body / end -->
<!-- sa-app__footer -->