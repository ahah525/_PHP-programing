# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)

```

## board.php (수정)
- MySQL DB를 연동
    - mysql_connect()
    - mysql_select_db()
- select 쿼리 스트링 실행
    - boardz의 레코드 중 search가 포함된 제목을 가진 레코드만 선택
- GET방식으로 받아온 변수 값
    - search
- MySQL에 쿼리 스트링 전송
    - mysql_query()를 이용
- 검색을 누르면 board.php로 돌아오게함
    - action > $PHP_SELF 
- 사진 출력 형식 지정을 위한 변수 생성
    - num > mysql_num_rows()를 이용해 DB의 레코드(사진) 개수 구함
    - a > floor()를 이용해 num을 3으로 나눈 값을 소수점 버림하여 몫을 구함
    - mod > num을 3으로 나눈 나머지
    - n > 출력할 사진 순서(현재 출력한 사진 수)
- 전달받은 레코드 가져옴
    - mysql_fetch_array()
    - $row[속성명] > title, contents, image_url
- 사진 출력 형식
    - search값이 없을 경우 모든 사진이 검색되어야함
    - search값이 3개 이상일 경우 사진 수에 맞게 3줄로 차례로 출력
        - 출력할 사진 순서가 1인 경우 무조건 ul 출력
        - li 는 출력 사진 순서에 상관 업이 매번 출력
        - 사진의 title과 contents는 NULL값이 아닐 때만 출력
        - 해당 사진 출력
        - /ul과 ul을 출력할 조건을 2가지 경우로 나눔
            - 1) 출력할 사진 순서의 3으로 나눈 나머지가 2이면 n== a+1 이거나 n== 2*(a+1)일 때
            - 2) 출력할 사진 순서의 3으로 나눈 나머지가 0/1이면 n== a 이거나 n== 2*a일 때
        - 출력할 사진이 마지막 순서가 되면 무조건 /ul 출력