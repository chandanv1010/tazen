<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$projects = [
    16 => [
        'name' => 'Dự án biệt thự quận 2',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Ông Nguyễn Văn Hoàng</li>
  <li><strong>Địa điểm:</strong> Thảo Điền, Quận 2, TP. Hồ Chí Minh</li>
  <li><strong>Nhà thầu thiết kế:</strong> KTS. Minh Đức & Associates</li>
  <li><strong>Quy mô:</strong> Biệt thự đơn lập sân vườn, 3 tầng, diện tích 450m2</li>
  <li><strong>Hạng mục cung cấp:</strong> Trọn bộ thiết bị vệ sinh cao cấp Tazen (Sen tắm âm tường, Vòi lavabo cảm ứng, Bồn tắm massage)</li>
  <li><strong>Năm hoàn thành:</strong> 2025</li>
</ul>',
        'content' => '<p>Biệt thự Thảo Điền Quận 2 là một trong những công trình biệt thự đơn lập sang trọng bậc nhất, được thiết kế theo phong cách hiện đại tối giản pha lẫn nét tân cổ điển quý phái. Tazen tự hào là đơn vị cung cấp độc quyền toàn bộ giải pháp thiết bị nhà tắm cao cấp cho dự án này.</p>
<p>Với yêu cầu khắt khe từ gia chủ về tính thẩm mỹ và độ bền vượt trội, Tazen đã mang đến bộ sưu tập sen vòi và thiết bị vệ sinh nhập khẩu nguyên chiếc. Điểm nhấn của phòng tắm chính (Master Bathroom) là hệ thống sen tắm nhiệt độ âm tường thông minh kết hợp bồn tắm Freestanding cao cấp, mang lại không gian thư giãn tuyệt vời như tại các resort 5 sao.</p>
<p>Toàn bộ sản phẩm sử dụng chất liệu đồng mạ Chrome 5 lớp sáng bóng, tích hợp công nghệ EcoClick giúp tiết kiệm nước tối đa nhưng vẫn đảm bảo áp lực dòng chảy êm ái, mang lại trải nghiệm tắm hoàn hảo và nâng tầm giá trị cho không gian sống của gia đình.</p>'
    ],
    17 => [
        'name' => 'Dự án căn hộ penthouse Vinhomes',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Bà Trần Kim Liên</li>
  <li><strong>Địa điểm:</strong> Căn hộ Landmark Penthouse, Vinhomes Central Park, Bình Thạnh</li>
  <li><strong>Thiết kế & thi công:</strong> Công ty CP Nội thất Luxury Home</li>
  <li><strong>Quy mô:</strong> Penthouse thông tầng, diện tích 380m2</li>
  <li><strong>Hạng mục cung cấp:</strong> Bồn cầu thông minh Tazen, Sen tắm cây âm trần đa chế độ, Vòi chậu lavabo mạ vàng PVD</li>
  <li><strong>Năm hoàn thành:</strong> 2025</li>
</ul>',
        'content' => '<p>Nằm trên tầng cao nhất của tòa tháp Landmark, căn hộ Penthouse Vinhomes Central Park sở hữu tầm nhìn triệu đô bao trọn dòng sông Sài Gòn thơ mộng. Dự án đòi hỏi các trang thiết bị nội thất phải đạt đến mức độ hoàn mỹ cả về kiểu dáng lẫn công nghệ.</p>
<p>Tazen đã đồng hành cùng đơn vị thiết kế để bố trí các thiết bị vệ sinh thông minh cao cấp nhất. Trong đó, dòng bồn cầu điện tử tích hợp sấy ấm và tự động xả cùng vòi lavabo mạ vàng PVD công nghệ cao đã tạo nên một không gian riêng tư cực kỳ sang trọng và quý phái.</p>
<p>Sự kết hợp giữa công nghệ điều khiển nhiệt độ chính xác của sen tắm âm trần và chất liệu tinh xảo giúp tối ưu hóa không gian phòng tắm, mang đến phong cách sống thượng lưu cho chủ sở hữu căn hộ.</p>'
    ],
    18 => [
        'name' => 'Dự án khách sạn nghỉ dưỡng Phú Quốc',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Tập đoàn Sun Resort Group</li>
  <li><strong>Địa điểm:</strong> Bãi Trường, Phú Quốc, Kiên Giang</li>
  <li><strong>Đơn vị vận hành:</strong> Marriott International</li>
  <li><strong>Quy mô:</strong> 250 phòng khách sạn 5 sao và 50 căn villa biển</li>
  <li><strong>Hạng mục cung cấp:</strong> Sen vòi đồng bộ, Phụ kiện phòng tắm inox 304 phủ PVD chống ăn mòn muối biển</li>
  <li><strong>Năm hoàn thành:</strong> 2026</li>
</ul>',
        'content' => '<p>Dự án Khách sạn & Khu nghỉ dưỡng cao cấp tại Phú Quốc là thử thách lớn đối với các thiết bị kim loại do tác động ăn mòn khắc nghiệt của muối biển và độ ẩm cao từ đại dương. Tazen đã nghiên cứu và đưa ra giải pháp bảo vệ bề mặt tối ưu cho các sản phẩm sen vòi cung cấp tại đây.</p>
<p>Toàn bộ hệ thống vòi lavabo, sen tắm đứng và phụ kiện phòng tắm của dự án được xử lý bề mặt bằng công nghệ mạ PVD tiên tiến nhất, tăng cường khả năng chống oxy hóa gấp 5 lần so với thông thường. Thiết kế tinh giản, sang trọng mang đậm hơi thở đại dương giúp hài hòa với kiến trúc xanh của khu nghỉ dưỡng.</p>
<p>Khách hàng lưu trú tại resort sẽ được trải nghiệm dòng chảy sen tắm êm ái nhờ công nghệ tạo bọt khí, mang lại cảm giác thư thái và xua tan mọi mệt mỏi sau ngày dài vui chơi khám phá đảo ngọc.</p>'
    ],
    19 => [
        'name' => 'Dự án resort cao cấp Nha Trang',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Công ty CP Đầu tư Du lịch Nha Trang</li>
  <li><strong>Địa điểm:</strong> Vịnh Nha Trang, Khánh Hòa</li>
  <li><strong>Quy mô:</strong> Khu biệt thự sườn đồi hướng biển cao cấp</li>
  <li><strong>Hạng mục cung cấp:</strong> Thiết bị vệ sinh cao cấp Tazen (Vòi rửa tay cảm ứng thông minh, Sen cây tắm massage, Bồn tắm đá tự nhiên)</li>
  <li><strong>Năm hoàn thành:</strong> 2025</li>
</ul>',
        'content' => '<p>Tọa lạc tại vị trí đắc địa trên sườn đồi hướng thẳng ra vịnh Nha Trang - một trong những vịnh biển đẹp nhất thế giới, khu resort nghỉ dưỡng cao cấp đòi hỏi phong cách thiết kế vừa sang trọng vừa gần gũi với thiên nhiên hoang sơ.</p>
<p>Tazen tự hào mang đến dòng sản phẩm sen tắm massage thác nước và bồn tắm đặt sàn sang trọng cho các căn biệt thự sườn đồi. Thiết kế thân thiện với môi trường, hạn chế lượng chì trong đồng dưới mức 0.25% bảo vệ sức khỏe người dùng tuyệt đối.</p>
<p>Hệ thống vòi rửa cảm ứng lắp đặt tại khu vực công cộng của resort giúp nâng cao tiêu chuẩn vệ sinh dịch tễ, đồng thời tối ưu hóa lượng nước tiêu thụ nhờ cảm biến hồng ngoại cực nhạy của Tazen Nhật Bản.</p>'
    ],
    20 => [
        'name' => 'Dự án chung cư cao cấp Ba Son',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Tập đoàn Alpha Holdings</li>
  <li><strong>Địa điểm:</strong> Số 2 Tôn Đức Thắng, Quận 1, TP. Hồ Chí Minh</li>
  <li><strong>Quy mô:</strong> 3 tòa tháp cao 45 tầng, 1.200 căn hộ cao cấp</li>
  <li><strong>Hạng mục cung cấp:</strong> Vòi chậu nóng lạnh, Sen cây điều chỉnh nhiệt độ, Gương Led cảm ứng thông minh</li>
  <li><strong>Năm hoàn thành:</strong> 2026</li>
</ul>',
        'content' => '<p>Dự án tổ hợp chung cư cao cấp tại Ba Son nằm ngay trung tâm Quận 1 sầm uất, là biểu tượng mới của phong cách sống đô thị hiện đại và năng động. Mỗi căn hộ tại đây đều được chăm chút kỹ lưỡng từng chi tiết nội thất nhỏ nhất.</p>
<p>Tazen đã cung cấp đồng bộ giải pháp phòng tắm thông minh bao gồm sen cây tắm điều chỉnh nhiệt độ tự động khóa an toàn ở 38 độ C, phòng tránh nguy cơ bỏng nước cho trẻ em và người già. Đi kèm là gương LED cảm ứng chống đọng sương hiện đại.</p>
<p>Sự tin cậy và chất lượng đỉnh cao của thiết bị vệ sinh Tazen đã giúp nâng tầm giá trị căn hộ, mang đến sự an tâm tuyệt đối và khẳng định phong cách sống tiện nghi của các chủ nhân tương lai.</p>'
    ],
    21 => [
        'name' => 'Biệt thự nghỉ dưỡng Đà Lạt',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Ông Lâm Tấn Phát</li>
  <li><strong>Địa điểm:</strong> Phường 10, Thành phố Đà Lạt, Lâm Đồng</li>
  <li><strong>Quy mô:</strong> Biệt thự gỗ kết hợp kính phong cách Châu Âu</li>
  <li><strong>Hạng mục cung cấp:</strong> Sen tắm ổn định nhiệt độ, Vòi chậu lavabo cổ điển giả cổ, Bồn tắm gỗ kết hợp acrylic</li>
  <li><strong>Năm hoàn thành:</strong> 2025</li>
</ul>',
        'content' => '<p>Với khí hậu se lạnh đặc trưng quanh năm của Đà Lạt, việc giữ ấm nước khi tắm và đảm bảo nhiệt độ nước ổn định tức thì là ưu tiên số một. Do đó, gia chủ biệt thự nghỉ dưỡng Đà Lạt đã lựa chọn dòng sen tắm nhiệt độ cao cấp của Tazen.</p>
<p>Sản phẩm ứng dụng lõi trộn nhiệt độ nhiệt tĩnh (thermostatic) siêu nhạy, tự động cân bằng nhiệt độ nước nóng - lạnh chỉ trong 0.5 giây ngay cả khi có sự thay đổi áp lực đột ngột từ các nguồn xả khác trong nhà.</p>
<p>Thiết kế vòi chậu và sen tắm mạ màu giả cổ đồng sang trọng vô cùng thích hợp với kiến trúc gỗ ấm cúng của biệt thự, tạo nên sự hòa quyện tuyệt vời giữa tính năng công nghệ hiện đại và tính thẩm mỹ cổ điển châu Âu.</p>'
    ],
    22 => [
        'name' => 'Dự án cao ốc văn phòng Landmark 81',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Tập đoàn Vingroup</li>
  <li><strong>Địa điểm:</strong> Tân Cảng, Quận Bình Thạnh, TP. Hồ Chí Minh</li>
  <li><strong>Quy mô:</strong> Tòa tháp cao 81 tầng, tổ hợp văn phòng, khách sạn, trung tâm thương mại</li>
  <li><strong>Hạng mục cung cấp:</strong> Thiết bị vệ sinh công cộng thông minh (Vòi cảm ứng âm tường, Máy sấy tay siêu tốc, Bệ tiểu cảm ứng)</li>
  <li><strong>Năm hoàn thành:</strong> 2018 (Nâng cấp hệ thống vệ sinh 2025)</li>
</ul>',
        'content' => '<p>Là tòa nhà cao nhất Việt Nam, Landmark 81 đón tiếp hàng chục ngàn lượt khách tham quan, làm việc và lưu trú mỗi ngày. Hệ thống nhà vệ sinh công cộng tại đây hoạt động với tần suất cực cao, yêu cầu thiết bị phải cực kỳ bền bỉ và tiết kiệm năng lượng.</p>
<p>Tazen đã được tin cậy lựa chọn cho dự án nâng cấp hệ thống thiết bị vệ sinh thông minh năm 2025. Vòi cảm ứng âm tường Tazen thế hệ mới sử dụng cảm biến laser tự động ngắt nước sau 30 giây liên tục để chống lãng phí nước và tràn ngập phòng vệ sinh.</p>
<p>Hệ thống van cảm ứng tiểu nam siêu nhạy tự động điều chỉnh chu kỳ xả giúp khử mùi triệt để, giữ cho không gian vệ sinh chung luôn sạch sẽ, thoáng mát và sang trọng xứng tầm một biểu tượng quốc gia.</p>'
    ],
    23 => [
        'name' => 'Khu đô thị sinh thái Sala',
        'description' => '<ul>
  <li><strong>Chủ đầu tư:</strong> Công ty Cổ phần Đại Quang Minh</li>
  <li><strong>Địa điểm:</strong> Khu đô thị Thủ Thiêm, Quận 2, TP. Hồ Chí Minh</li>
  <li><strong>Quy mô:</strong> Phân khu biệt thự và căn hộ thấp tầng cao cấp Sarimi, Sarica</li>
  <li><strong>Hạng mục cung cấp:</strong> Thiết bị phòng tắm đồng bộ thương hiệu Tazen cao cấp</li>
  <li><strong>Năm hoàn thành:</strong> 2025</li>
</ul>',
        'content' => '<p>Khu đô thị sinh thái Sala Thủ Thiêm nổi tiếng với không gian xanh mát, trong lành và các căn hộ, biệt thự cao cấp có phong cách thiết kế hiện đại, tinh tế. Đây là nơi hội tụ tầng lớp cư dân thành đạt của thành phố.</p>
<p>Dự án lắp đặt đồng bộ sen tắm cây, vòi chậu rửa mặt, vòi bếp thông minh kéo rút của Tazen cho các căn hộ mẫu và phân khu cao cấp. Vòi bếp thông minh Tazen có dây kéo rút linh hoạt giúp việc dọn dẹp nhà bếp dễ dàng hơn bao giờ hết.</p>
<p>Bề mặt mạ chrome siêu bóng chống bám vân tay và bám cặn canxi giúp các bà nội trợ dễ dàng vệ sinh lau chùi, duy trì vẻ đẹp mới tinh tươm cho gian bếp và phòng tắm theo thời gian.</p>'
    ],
];

foreach ($projects as $id => $data) {
    DB::table('post_language')
        ->where('post_id', $id)
        ->update([
            'description' => $data['description'],
            'content' => $data['content']
        ]);
    echo "Updated project post ID: $id\n";
}
echo "All done!\n";
