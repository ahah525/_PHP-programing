# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
## index.php 수정
index.php는 DB에 저장된 구매 내역을 보여주는 초기 화면이다.
- MySQL DB를 연동
    - mysql_connect()
    - mysql_select_db()
- select 쿼리 스트링 실행
    - tableboard_shop의 모든 속성    
- MySQL에 쿼리 스트링 전송
    - mysql_query()를 이용    
- 쿼리결과(레코드) 가져오기
    - mysql_fetch_array()
    - $row[속성명] > date, order_id, name, price, quantity
    - total = prcie * quantity

## boad_from.php 수정
- index.php에서 GET방식으로 받아온 변수 값 가져옴
    - num
-  MySQL 테이블에서, num에 해당하는 레코드 가져오기
    - select 쿼리 스트링 실행
    - mysql_query()
    - mysql_fetch_array()
- update의 경우
    - num에 해당하는 레코드 값들을 $row[속성명]으로 출력
    
## function
### insert.php 수정
- MySQL DB를 연동
    - mysql_connect()
    - mysql_select_db()
- insert 쿼리 스트링 실행
    - tableboard_shop의 num에 해당하는 레코드
- GET& POST방식으로 받아온 변수 값
    - name > GET
    - date, order_id, name, price quantity > POST
- MySQL에 쿼리 스트링 전송
    - mysql_query()를 이용
- 삽입 에러 메시지 출력
    - 레코드 값이 없을 경우  

### update.php 수정
- MySQL DB를 연동
    - mysql_connect()
    - mysql_select_db()
- update 쿼리 스트링 실행
    - tableboard_shop의 num에 해당하는 레코드
- GET& POST방식으로 받아온 변수 값
    - name > GET
    - date, order_id, name, price quantity > POST
- MySQL에 쿼리 스트링 전송
    - mysql_query()를 이용
- 수정 에러 메시지 출력
    - 레코드 값이 없을 경우  

### delete.php 수정
- MySQL DB를 연동
    - mysql_connect()
    - mysql_select_db()
- delete 쿼리 스트링 실행
    - tableboard_shop의 num에 해당하는 레코드
- GET& POST방식으로 받아온 변수 값
    - name > GET
    - date, order_id, name, price quantity > POST
- MySQL에 쿼리 스트링 전송
    - mysql_query()를 이용
- 수정 에러 메시지 출력
    - 레코드 값이 없을 경우
