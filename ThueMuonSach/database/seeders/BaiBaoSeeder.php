<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BaiBao;

class BaiBaoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'tieude' => 'Những cuốn sách kinh điển mọi thời đại',
                'noidung' => 'Sách kinh điển luôn là nguồn cảm hứng vô tận cho nhiều thế hệ độc giả. Trong bài báo này, chúng ta sẽ khám phá những cuốn sách kinh điển mà bạn không thể bỏ qua. Từ "Chiến tranh và hòa bình" của Leo Tolstoy đến "Đồi gió hú" của Emily Brontë, mỗi cuốn sách đều mang đến những câu chuyện sâu sắc và ý nghĩa. Hãy cùng chúng tôi tìm hiểu về những tác phẩm này và lý do tại sao chúng lại được coi là kinh điển.',
                'hinhanh' => 'sach-kinh-dien.jpg',
                'ngaydang' => now(),
                'manhanvien' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Top 10 truyện tranh Nhật Bản nổi tiếng nhất',
                'noidung' => 'Truyện tranh Nhật Bản, hay còn gọi là manga, đã trở thành một phần không thể thiếu trong văn hóa đọc của nhiều người. Bài báo này sẽ giới thiệu top 10 truyện tranh Nhật Bản nổi tiếng nhất mà bạn nên đọc. Từ "Naruto" đến "One Piece", mỗi bộ truyện đều có những câu chuyện hấp dẫn và nhân vật đáng nhớ. Hãy cùng chúng tôi khám phá thế giới manga và tìm hiểu lý do tại sao chúng lại được yêu thích đến vậy.',
                'hinhanh' => 'truyen-tranh.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách self-help giúp bạn thay đổi cuộc sống',
                'noidung' => 'Sách self-help luôn là nguồn động lực và cảm hứng cho nhiều người. Bài báo này sẽ giới thiệu những cuốn sách self-help hay nhất giúp bạn thay đổi cuộc sống. Từ "Đắc nhân tâm" của Dale Carnegie đến "7 thói quen của người thành đạt" của Stephen Covey, mỗi cuốn sách đều mang đến những bài học quý giá và phương pháp thực tiễn để cải thiện bản thân. Hãy cùng chúng tôi khám phá những cuốn sách này và bắt đầu hành trình thay đổi cuộc sống của bạn.',
                'hinhanh' => 'self-help.jpg',
                'ngaydang' => now(),
                'manhanvien' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những bộ truyện tranh thiếu nhi hay nhất mọi thời đại',
                'noidung' => 'Truyện tranh thiếu nhi luôn là người bạn đồng hành tuyệt vời của các em nhỏ. Bài báo này sẽ giới thiệu những bộ truyện tranh thiếu nhi hay nhất mọi thời đại. Từ "Doraemon" đến "Thám tử lừng danh Conan", mỗi bộ truyện đều mang đến những câu chuyện thú vị và bài học ý nghĩa. Hãy cùng chúng tôi khám phá những bộ truyện tranh này và tìm hiểu lý do tại sao chúng lại được yêu thích đến vậy.',
                'hinhanh' => 'truyen-thieu-nhi.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách khoa học viễn tưởng đáng đọc nhất',
                'noidung' => 'Sách khoa học viễn tưởng luôn mang đến những câu chuyện kỳ thú và những ý tưởng đột phá. Bài báo này sẽ giới thiệu những cuốn sách khoa học viễn tưởng đáng đọc nhất. Từ "Dune" của Frank Herbert đến "Neuromancer" của William Gibson, mỗi cuốn sách đều mở ra những thế giới mới lạ và những cuộc phiêu lưu hấp dẫn. Hãy cùng chúng tôi khám phá những tác phẩm này và tìm hiểu lý do tại sao chúng lại được coi là những kiệt tác của thể loại khoa học viễn tưởng.',
                'hinhanh' => 'khoa-hoc-vien-tuong.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách trinh thám hay nhất bạn nên đọc',
                'noidung' => 'Sách trinh thám luôn thu hút độc giả bởi những câu chuyện ly kỳ và những vụ án bí ẩn. Bài báo này sẽ giới thiệu những cuốn sách trinh thám hay nhất mà bạn nên đọc. Từ "Sherlock Holmes" của Arthur Conan Doyle đến "Cô gái trên tàu" của Paula Hawkins, mỗi cuốn sách đều mang đến những câu chuyện hấp dẫn và những nhân vật đáng nhớ. Hãy cùng chúng tôi khám phá những tác phẩm này và tìm hiểu lý do tại sao chúng lại được yêu thích đến vậy.',
                'hinhanh' => 'trinh-tham.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách văn học Việt Nam nổi bật',
                'noidung' => 'Văn học Việt Nam luôn mang đến những câu chuyện sâu sắc và ý nghĩa. Bài báo này sẽ giới thiệu những cuốn sách văn học Việt Nam nổi bật mà bạn nên đọc. Từ "Chí Phèo" của Nam Cao đến "Nỗi buồn chiến tranh" của Bảo Ninh, mỗi cuốn sách đều phản ánh những khía cạnh khác nhau của cuộc sống và con người Việt Nam. Hãy cùng chúng tôi khám phá những tác phẩm này và tìm hiểu lý do tại sao chúng lại được coi là những kiệt tác của văn học Việt Nam.',
                'hinhanh' => 'van-hoc-viet-nam.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những bộ truyện tranh học đường đáng đọc nhất',
                'noidung' => 'Truyện tranh học đường luôn mang đến những câu chuyện gần gũi và những bài học ý nghĩa. Bài báo này sẽ giới thiệu những bộ truyện tranh học đường đáng đọc nhất. Từ "Kimi ni Todoke" đến "Ao Haru Ride", mỗi bộ truyện đều mang đến những câu chuyện tình bạn, tình yêu và những kỷ niệm đáng nhớ của tuổi học trò. Hãy cùng chúng tôi khám phá những bộ truyện tranh này và tìm hiểu lý do tại sao chúng lại được yêu thích đến vậy.',
                'hinhanh' => 'truyen-hoc-duong.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách phiêu lưu mạo hiểm không thể bỏ qua',
                'noidung' => 'Sách phiêu lưu mạo hiểm luôn mang đến những cuộc hành trình kỳ thú và những trải nghiệm đáng nhớ. Bài báo này sẽ giới thiệu những cuốn sách phiêu lưu mạo hiểm không thể bỏ qua. Từ "Robinson Crusoe" của Daniel Defoe đến "Hành trình vào tâm Trái Đất" của Jules Verne, mỗi cuốn sách đều mở ra những thế giới mới lạ và những cuộc phiêu lưu hấp dẫn. Hãy cùng chúng tôi khám phá những tác phẩm này và tìm hiểu lý do tại sao chúng lại được coi là những kiệt tác của thể loại phiêu lưu mạo hiểm.',
                'hinhanh' => 'phieu-luu.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tieude' => 'Những cuốn sách lãng mạn hay nhất bạn nên đọc',
                'noidung' => 'Sách lãng mạn luôn mang đến những câu chuyện tình yêu ngọt ngào và những cảm xúc sâu lắng. Bài báo này sẽ giới thiệu những cuốn sách lãng mạn hay nhất mà bạn nên đọc. Từ "Pride and Prejudice" của Jane Austen đến "The Notebook" của Nicholas Sparks, mỗi cuốn sách đều mang đến những câu chuyện tình yêu đầy cảm xúc và những nhân vật đáng nhớ. Hãy cùng chúng tôi khám phá những tác phẩm này và tìm hiểu lý do tại sao chúng lại được yêu thích đến vậy.',
                'hinhanh' => 'lang-man.jpg',
                'ngaydang' => now(),
                'manhanvien' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($data as $item) {
            BaiBao::create($item);
        }
        // Tạo một số bài báo ngẫu nhiên
        // BaiBao::factory()->count(15)->create();
    }
}
