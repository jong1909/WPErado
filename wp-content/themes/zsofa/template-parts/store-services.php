<?php
$zsofa_values = [
        'facilities'=>[
            'title'=>'Cơ sở vật chất sang trọng',
            'value'=>'Showroom rộng lớn, thiết kế hiện đại sang trọng theo tiêu chuẩn 3S, phục vụ tốt nhất cho khách hàng'
        ],
        'exquisite'=>[
            'title'=>'Sản phẩm tinh xảo',
            'value'=>'Mẫu sản phẩm được thiết kế hoàn mỹ, sắc nét vượt trội, vật liệu hạng sang, nguồn gốc rõ ràng!'
        ],
        'professional'=>[
            'title'=>'Nhân lực chuyên nghiệp',
            'value'=>'Nhân sự Zsofa được đào tạo chuẩn quốc tế, quy trình lắp đặt được thực hiện an toàn chuyên nghiệp'
        ],
        'warranty'=>[
            'title'=>'Bảo hành sản phẩm',
            'value'=>'Dịch vụ bảo hành tận nơi. Cam kết chế độ bảo hành chu đáo, tận tâm, linh hoạt. Ghét chậm trễ'
        ]
];

?>
<div class="section-2 store-services">
    <div class="container">
        <div class="title-customer">
            "Nghệ sỹ Quang Tèo và Á hậu Huyền My"
        </div>
        <h2 class="why-choose-us">CÙNG HÀNG NGHÌN KHÁCH HÀNG <strong>ĐÃ CHỌN ZSOFA</strong> BỞI :</h2>
        <div class="store-services-content row">
            <div class="col-md-3 phy-facilities">
                <?php $field_name = "field_5b43a6279d939";
                $field = get_field_object($field_name);
                ?>
                <h3><?php echo (!empty($field['label'])) ? $field['label']: $zsofa_values['facilities']['title']; ?></h3>
                <p class="item-desc">
                    <?php echo (!empty($field['instructions'])) ? $field['instructions'] : $zsofa_values['facilities']['value']; ?>
                </p>
            </div>
            <div class="col-md-3 exquisite-product">
                <?php $field_name = "field_5b43a68b9d93b";
                $field = get_field_object($field_name);
                ?>
                <h3><?php echo (!empty($field['label'])) ? $field['label']: $zsofa_values['exquisite']['title']; ?></h3>
                <p class="item-desc">
                    <?php echo (!empty($field['instructions'])) ? $field['instructions'] : $zsofa_values['exquisite']['value']; ?>
                </p>
            </div>
            <div class="col-md-3 professional-human">
                <?php $field_name = "field_5b43a6a59d93c";
                $field = get_field_object($field_name);
                ?>
                <h3><?php echo (!empty($field['label'])) ? $field['label']: $zsofa_values['professional']['title']; ?></h3>
                <p class="item-desc">
                    <?php echo (!empty($field['instructions'])) ? $field['instructions'] : $zsofa_values['professional']['value']; ?>
                </p>
            </div>
            <div class="col-md-3 product-warranty">
                <?php $field_name = "field_5b43a6c49d93d";
                $field = get_field_object($field_name);
                ?>
                <h3><?php echo (!empty($field['label'])) ? $field['label']: $zsofa_values['warranty']['title']; ?></h3>
                <p class="item-desc">
                    <?php echo (!empty($field['instructions'])) ? $field['instructions'] : $zsofa_values['warranty']['value']; ?>
                </p>
            </div>
        </div>
    </div>
</div>
