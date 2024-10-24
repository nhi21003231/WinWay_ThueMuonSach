@extends('KhachHang.layouts.index')

@section('content')
    <!-- Hero Section End -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <h4>1. Điều khoản về sử dụng website</h4>
                        <p>- Chúng tôi lập ra trang website này để cung cấp dịch vụ thuê mượn sách, báo, và truyện. 
                            Khi quý khách truy cập vào website, đồng nghĩa với việc quý khách chấp nhận các điều khoản 
                            và chính sách được đưa ra. Các điều khoản và chính sách này có thể thay đổi bất cứ lúc nào và 
                            có hiệu lực ngay khi được đăng tải lên website. Việc tiếp tục sử dụng website sau khi nội dung
                            mới được cập nhật đồng nghĩa với việc quý khách nhận thức và chấp nhận các nội dung đã thay đổi.
                            Quý khách nên thường xuyên kiểm tra các điều khoản và chính sách để nắm bắt những cập nhật mới nhất
                              .</p>
                        <p>- KQuý khách có quyền tạo tài khoản trên website để thuận tiện cho việc giao dịch, theo dõi lịch
                            sử thuê mượn, và hưởng các ưu đãi khách hàng thân thiết. Trong trường hợp tạo tài khoản, quý 
                            khách phải tuân thủ các điều khoản về bảo mật và quản lý tài khoản. Chúng tôi không chịu 
                            trách nhiệm cho bất cứ tổn thất nào nếu quý khách không tuân thủ các điều khoản này./p>
                        <p>- Chúng tôi có thể gửi email quảng cáo hoặc thông tin khuyến mãi dựa vào lịch sử thuê mượn ấn
                             phẩm của quý khách.</p>
                        <p>- Quý khách không được phép sử dụng website cho bất kỳ mục đích nào ngoài việc thuê mượn ấn phẩm sách, 
                            báo và truyện đã được cung cấp trừ khi có thỏa thuận cụ thể bằng văn bản.</p>
                        <h4>2. Quy định về bảo mật dữ liệu</h4>
                        <p>- TThông tin cá nhân của quý khách sẽ được bảo vệ và không chia sẻ với bên thứ ba trừ khi 
                            được cơ quan pháp luật yêu cầuu. </p>
                        <p>- Trong trường hợp phát hiện thông tin bị sử dụng sai mục đích, quý khách có thể gửi 
                            khiếu nại qua email quản lý để được hỗ trợ kịp thời:VoVanNhi_WindWayShop.com. </p>
                        <p>- Việc tấn công hệ thống bảo mật của website để đánh cắp dữ liệu hoặc thay đổi nội dung 
                            website là hành vi vi phạm pháp luật và sẽ bị xử lý bởi cơ quan chức năng.</p>
                        <h4>3. Thương hiệu và bản quyền</h4>
                        <p>Thương hiệu và nội dung website thuộc sở hữu của NumberTwo, bao gồm các sản phẩm, hình ảnh, 
                            video, mã code, và logo, được bảo hộ theo luật sở hữu trí tuệ của nước CHXHCN Việt Nam.</p>
                        <p>Tất cả nội dung trên website đều được bảo vệ bởi luật bản quyền.</p>
                        <h4>4. Quy trình thuê mượn và xác nhận đơn hàng</h4>
                        <h5>4.1 Thuê mượn ấn phẩm</h5>
                        <p>Việc thuê mượn ấn phẩm được thực hiện thông qua các bước lựa chọn, xác nhận đơn hàng, và thanh toán trên website. 
                            Đơn đặt hàng cũng có thể được khởi tạo qua điện thoại hoặc email, nhưng vẫn phải được ghi nhận trên website. </p>
                        <h5>4.2 Xác nhận đơn hàng</h5>
                        <p>Chúng tôi sẽ xác nhận đơn đặt hàng qua email và liên lạc với khách hàng để xác nhận chi tiết ấn phẩm, số lượng, 
                            địa điểm giao hàng, và các chi tiết khác. NumberTwo có quyền từ chối đơn hàng vì bất cứ lý do nào và hoàn tiền 
                            nếu người thuê đã thanh toán..</p>
                        <h5>4.3 Giá thuê</h5>
                        <p>Giá thuê ấn phẩm đăng trên website chưa bao gồm chi phí vận chuyển,
                            nếu có. WindWayShop sẽ thông báo chi tiết về giá thuê và phí vận chuyển trước khi khách hàng thanh toán.</p>
                        <h5>4.4 Vai trò và trách nhiệm</h5>
                        <p>Bên cho thuê: Cung cấp đúng ấn phẩm đã xác nhận cho khách hàng và hỗ trợ các vấn đề liên quan đến giao nhận, 
                            đổi, hoặc trả hàng theo chính sách.</p>
                        <p>
                        Khách hàng: Thanh toán đúng hạn và tuân thủ các điều khoản về mượn và trả ấn phẩm
                        </p>
                        <h5>4.5 Phương thức thanh toán</h5>
                        <p>Thanh toán trực tuyến: Chính sách thanh toán của chúng tôi được thiết kế nhằm đảm bảo sự
                            thuận lợi và an toàn cho khách hàng khi mua sắm trên trang web của chúng tôi. Chúng tôi cung
                            cấp nhiều phương thức thanh toán linh hoạt để đáp ứng đa dạng nhu cầu của khách hàng.</p>
                        <p>Chuyển khoản ngân hàng: Chúng tôi chấp nhận thanh toán trực tuyến thông qua các phương thức
                            an toàn như thẻ tín dụng/debit và các dịch vụ thanh toán trực tuyến phổ biến khác. Tất cả
                            thông tin thanh toán của khách hàng đều được bảo vệ bằng các biện pháp an ninh cao cấp để
                            đảm bảo tính riêng tư và an toàn.</p>
                        <p>Thanh toán khi nhận hàng: Khách hàng cũng có thể sử dụng phương thức chuyển khoản ngân hàng
                            để thanh toán. Chúng tôi cung cấp thông tin tài khoản ngân hàng để đơn giản hóa quá trình
                            chuyển khoản và đảm bảo tính chính xác của giao dịch.</p>
                        <p>Đối với một số địa chỉ và đơn đặt hàng cụ thể, chúng tôi hỗ trợ hình thức thanh toán khi nhận
                            hàng. Khách hàng có thể thanh toán tiền mặt khi nhận được sản phẩm tại địa chỉ giao hàng.
                        </p>
                        <h4>5. Quy định về đổi trả ấn phẩm</h4>
                        <h5>5.1 Thời gian đổi trả</h5>
                        <p>Khách hàng có thể yêu cầu đổi hoặc trả ấn phẩm trong khoảng thời gian quy định sau khi nhận 
                            được hàng, tùy vào loại ấn phẩm và điều kiện áp dụng.</p>
                        <h5>5.2 Điều kiện đổi trả</h5>
                        <p>Ấn phẩm phải còn nguyên vẹn, không bị hư hỏng hoặc có dấu vết sử dụng quá mức. Một số ấn phẩm 
                            có thể yêu cầu điều kiện bảo hành riêng.</p>
                        <h5>5.3 Quy trình đổi trả</h5>
                        <p>Khách hàng cần thông báo và tuân thủ quy trình đổi trả được nêu rõ trên website hoặc qua dịch vụ khách hàng.</p>
                        <h4>6. Hóa đơn bán hàng</h4>
                        <p>Chúng tôi cung cấp hóa đơn cho các đơn hàng và lưu trữ thông tin qua dịch vụ hóa đơn điện tử. Quý khách cần cung
                            cấp thông tin đầy đủ để lập hóa đơn chính xác. </p>
                        <h4>7. Giao nhận hàng hóa/đổi trả</h4>
                        <p>Việc giao nhận ấn phẩm sẽ phụ thuộc vào thỏa thuận giữa người thuê và bên cho thuê về việc sử dụng dịch vụ giao nhận.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
