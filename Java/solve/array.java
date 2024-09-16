package Java.testQuestion.solve;

import java.util.Arrays;

public class array {
    public void week () {
        StringBuilder sb = new StringBuilder();
        String[] mtwt = {"월", "화", "수", "목"};
        String[] fss = {"금", "토", "일"};
        String[] weak = new String [mtwt.length + fss.length];
        System.arraycopy(mtwt,0, weak, 0, mtwt.length);
        // 원본배열, 복사를  시작할 인덱스의 위치, 복사본의 위치, 붙여넣기할 인덱스의 위치, 복사 길이
        System.arraycopy(fss, 0, weak, mtwt.length, fss.length);

        System.out.println(Arrays.toString(weak)); // 배열 쉽게 불러오는 방법 API - Arrays 이용하기

        // 배열 불러오는 방법 2
        for (int i = 0; i < weak.length; i++) {
            System.out.println(weak[i]);
        }

        // 똑같지만 ln의 유뮤에 따라 달라지는 모습
        for (int i = 0; i < weak.length; i++) {
            System.out.print(weak[i]);
        }
        System.out.println();

        // 조금 더 디테일하게 변경
        for (int i = 0; i < weak.length;) { // 증감식이 없어도 되는 부분
            System.out.print(weak[i]);
            if (++i < weak.length) { // ++i를 사용하여야 월, 화, 수, 목, 금, 토, 일 로 나타나고 i++를 사용하면 월, 화, 수, 목, 금, 토, 일, 로 쉼표가 끝에도 나타나 ++i를 사용해야 했다.
                System.out.print(", ");
            }
        }
    }
}
