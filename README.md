# PRO1014

GIT FLOW: 

Checkout từ main sang 1 nhánh mới và đặt tên là dev.

Tất cả các chức năng mới đều phải được đẩy vào dev để kiểm tra lại sau khi hoàn thiện mới đẩy lên main.

Checkout từ develop ra nhánh mới để code chức năng.

Công việc trước khi code chức năng mới:

0. chuyển về dev.

1. Các bạn phải pull code mới nhất ở trên dev về nhánh feature.

#Pull Code: Lấy code mới nhất từ develop về máy tính cá nhân (VSC)

2. Checkout từ dev sang nhánh mới. => chưa đổi nhánh

3. code

4. đẩy nhánh mới đấy lên online

5. Tạo pull request. 

PULL request: Base là nơi nhận code <- compare: là nơi chuyển code

Code mới được thay đổi....

Tạo lại vừa code đấy hihi.

2 cách nâng cao để giải quyết conflict tại visual studio code.

Bước 1: Là các bạn phải lưu code mới đang code trên nhánh hiện tại vào bộ nhớ của mtinh cá nhân. 
=> Bấm dấu ... => "Stash" => chuyển sang nhánh dev => lấy code về => chuyển về nhánh đang code => Pop Stash.

Bước 2: 

1. -> rebase code(Rebase Branch): Phải commit code lên onl trước rồi mới có thể sử dụng được. Bấm dấu ... => "Branch" => Chọn rebase => Chọn nhánh có code mới nhất mà mình muốn xử lý conflict => xử lý bằng cách accept current || Accept Icoming || Accept Both.   

2. -> merge code(Merge Branch): Phải commit code lên onl trước rồi mới có thể sử dụng được.  Bấm dấu ... => "Branch" => Chọn merge => Chọn nhánh có code mới nhất mà mình muốn xử lý conflict => xử lý bằng cách accept current || Accept Icoming || Accept Both.   


AAAABBBBCCCCDDDDD
