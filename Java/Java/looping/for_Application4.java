package question.Java.looping;

import java.util.Scanner;

public class for_Application4 {
    public void allPlus () {
        /* 문자열을 입력 받아서 문자열의 각 인덱스별로 한 글자씩 출력하세요
         *
         * 참고) 문자열의 길이는 String 클래스의 length() 메소드를 이용할 수 있습니다.
         *
         * -- 입력 예시 --
         * 문자열을 입력하세요 : apple
         *
         * -- 출력 예시 --
         * 0 : a
         * 1 : p
         * 2 : p
         * 3 : l
         * 4 : e
         * */

        System.out.print("문자열을 입력하세요 : ");
        Scanner sc = new Scanner(System.in);
        String answer = sc.nextLine();

        for(int i=0; i < answer.length(); i++ ) {
            char one = answer.charAt(i);
            System.out.println(i + " : " + one);
        }
    }
}
