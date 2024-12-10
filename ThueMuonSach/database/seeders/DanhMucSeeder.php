<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['tendanhmuc' => 'Sách Giáo Khoa', 
             'mota' => 'Các loại sách giáo khoa cho học sinh, sinh viên, bao gồm những tài liệu cần thiết cho việc học tập và giảng dạy. Những cuốn sách này thường được biên soạn theo chương trình học của các cấp học khác nhau, từ tiểu học đến trung học phổ thông. Chúng cung cấp kiến thức cơ bản về toán học, ngữ văn, khoa học tự nhiên, và các môn học khác, giúp học sinh nắm vững kiến thức nền tảng. Sách giáo khoa cũng thường đi kèm với các bài tập thực hành và hướng dẫn ôn tập, hỗ trợ học sinh trong việc củng cố kiến thức và chuẩn bị cho các kỳ thi.'],
            
            ['tendanhmuc' => 'Sách Khoa Học', 
             'mota' => 'Sách về khoa học tự nhiên và khoa học xã hội, bao gồm những tác phẩm nghiên cứu, luận văn, và sách tham khảo. Những cuốn sách này giúp độc giả hiểu rõ hơn về các khái niệm khoa học, từ vật lý, hóa học đến sinh học và các lĩnh vực xã hội như tâm lý học và nhân văn. Thông qua việc đọc những tác phẩm này, độc giả sẽ có cơ hội nâng cao kiến thức và khám phá những vấn đề phức tạp của thế giới xung quanh, từ đó phát triển tư duy phản biện và kỹ năng phân tích.'],
            
            ['tendanhmuc' => 'Sách Văn Học', 
             'mota' => 'Các tác phẩm văn học cổ điển và hiện đại, bao gồm tiểu thuyết, thơ ca, truyện ngắn và kịch. Những cuốn sách này không chỉ mang đến những câu chuyện thú vị mà còn phản ánh văn hóa, lịch sử và tâm tư của con người. Đọc văn học giúp độc giả phát triển khả năng cảm thụ nghệ thuật, nuôi dưỡng tâm hồn và mở rộng tầm hiểu biết về cuộc sống. Văn học cũng thường chứa đựng những bài học quý giá về tình yêu, nhân cách, và xã hội, khuyến khích người đọc suy nghĩ và cảm nhận sâu sắc hơn.'],
            
            ['tendanhmuc' => 'Sách Lịch Sử', 
             'mota' => 'Sách liên quan đến các sự kiện lịch sử thế giới và Việt Nam, giúp độc giả hiểu rõ hơn về quá khứ và những biến cố đã hình thành nên hiện tại. Những cuốn sách này thường cung cấp cái nhìn sâu sắc về các giai đoạn lịch sử, nhân vật nổi bật và các cuộc chiến tranh, đồng thời phân tích nguyên nhân và hậu quả của các sự kiện. Đọc sách lịch sử không chỉ giúp ta học hỏi từ quá khứ mà còn giúp ta định hình tương lai, từ đó trở thành những công dân có trách nhiệm và hiểu biết hơn.'],
            
            ['tendanhmuc' => 'Sách Tâm Lý', 
             'mota' => 'Các loại sách về tâm lý học và phát triển bản thân, cung cấp những kiến thức và kỹ năng cần thiết để hiểu và cải thiện tâm lý của bản thân. Những cuốn sách này thường bàn về các khái niệm như cảm xúc, hành vi, và động lực, đồng thời đưa ra các phương pháp và bài tập thực hành nhằm giúp người đọc phát triển kỹ năng giao tiếp, quản lý cảm xúc và cải thiện mối quan hệ. Đọc sách tâm lý không chỉ giúp bạn hiểu rõ hơn về chính mình mà còn giúp bạn xây dựng những mối quan hệ lành mạnh và hiệu quả.'],
            
            ['tendanhmuc' => 'Sách Kinh Tế', 
             'mota' => 'Sách về kinh tế, tài chính và quản trị kinh doanh, cung cấp cho độc giả những kiến thức cần thiết để hiểu và áp dụng các nguyên lý kinh tế vào thực tiễn. Các cuốn sách này thường đề cập đến các vấn đề như thị trường, đầu tư, quản lý rủi ro, và chiến lược kinh doanh. Đọc sách kinh tế giúp người đọc phát triển tư duy phân tích và khả năng ra quyết định, từ đó có thể lập kế hoạch tài chính cá nhân hoặc quản lý một doanh nghiệp hiệu quả hơn.'],
            
            ['tendanhmuc' => 'Sách Y Học', 
             'mota' => 'Sách về y học và sức khỏe, cung cấp thông tin về bệnh tật, phương pháp điều trị, và cách duy trì sức khỏe. Những cuốn sách này không chỉ dành cho các chuyên gia y tế mà còn cho tất cả những ai quan tâm đến sức khỏe của bản thân và gia đình. Đọc sách y học giúp người đọc nâng cao kiến thức về cơ thể con người, các bệnh lý thường gặp và cách phòng ngừa chúng, đồng thời khuyến khích lối sống lành mạnh và thực hành chăm sóc sức khỏe.'],
            
            ['tendanhmuc' => 'Sách Công Nghệ', 
             'mota' => 'Sách về công nghệ thông tin, lập trình và kỹ thuật, giúp người đọc nắm bắt những xu hướng và công nghệ mới. Những cuốn sách này thường đào sâu vào các ngôn ngữ lập trình, phát triển phần mềm, và các ứng dụng công nghệ trong thực tế. Đọc sách công nghệ không chỉ giúp cải thiện kỹ năng chuyên môn mà còn mở ra cơ hội nghề nghiệp trong một lĩnh vực đang phát triển mạnh mẽ. Thông qua việc cập nhật kiến thức mới, người đọc có thể áp dụng công nghệ vào công việc và đời sống hàng ngày.'],
            
            ['tendanhmuc' => 'Sách Nghệ Thuật', 
             'mota' => 'Các sách về nghệ thuật, hội họa, âm nhạc và sân khấu, khám phá vẻ đẹp và ý nghĩa của các hình thức nghệ thuật khác nhau. Những cuốn sách này thường giới thiệu về các nghệ sĩ, tác phẩm nổi bật và các phong trào nghệ thuật. Đọc sách nghệ thuật giúp người đọc phát triển khả năng cảm thụ nghệ thuật, đồng thời khuyến khích sự sáng tạo và cá tính của mỗi người. Văn hóa nghệ thuật cũng giúp gắn kết cộng đồng và mang lại giá trị tinh thần cho con người.'],
            
            ['tendanhmuc' => 'Sách Thiếu Nhi', 
             'mota' => 'Sách dành cho trẻ em, thiếu nhi và thiếu niên, bao gồm các câu chuyện, truyện tranh và sách giáo dục. Những cuốn sách này không chỉ giúp trẻ em giải trí mà còn giáo dục và phát triển trí tưởng tượng, tư duy sáng tạo. Đọc sách từ nhỏ giúp trẻ hình thành thói quen đọc sách, nâng cao khả năng ngôn ngữ và khuyến khích sự tìm tòi khám phá thế giới xung quanh. Đồng thời, sách thiếu nhi cũng thường chứa đựng những bài học về đạo đức và giá trị sống.'],
            
            ['tendanhmuc' => 'Sách Thể Thao', 
             'mota' => 'Sách về các bộ môn thể thao và rèn luyện thể chất, cung cấp kiến thức về kỹ thuật, chiến thuật và chế độ dinh dưỡng cho vận động viên. Những cuốn sách này thường chia sẻ kinh nghiệm từ các vận động viên nổi tiếng và các chuyên gia thể thao, giúp độc giả hiểu rõ hơn về cách duy trì một lối sống năng động và khỏe mạnh. Đọc sách thể thao không chỉ giúp nâng cao kỹ năng cá nhân mà còn khuyến khích tinh thần đồng đội và sự nỗ lực không ngừng.'],
            
            ['tendanhmuc' => 'Sách Du Lịch', 
             'mota' => 'Sách về du lịch, văn hóa, và phong tục các vùng miền, cung cấp thông tin hữu ích cho những ai đam mê khám phá thế giới. Những cuốn sách này thường bao gồm hướng dẫn du lịch, trải nghiệm văn hóa và các bí quyết du lịch an toàn và thú vị. Đọc sách du lịch giúp độc giả mở rộng hiểu biết về các nền văn hóa khác nhau, từ đó nâng cao sự cảm thông và tôn trọng đối với sự đa dạng của nhân loại.'],
            
            ['tendanhmuc' => 'Sách khác', 
             'mota' => 'Danh mục không xác định, bao gồm những sách không thuộc vào các thể loại cụ thể. Những cuốn sách này có thể mang tính chất giải trí, thông tin, hoặc khám phá các chủ đề khác nhau trong cuộc sống. Đọc sách ở danh mục này thường mang đến những trải nghiệm mới mẻ và đa dạng, giúp người đọc mở rộng tầm hiểu biết và khám phá những khía cạnh khác nhau của cuộc sống mà họ chưa từng nghĩ tới.']
        ];
        

        foreach ($data as $item) {
            DanhMuc::create($item);
        }

        // DanhMuc::factory(10)->create();
    }
}
