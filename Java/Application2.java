package question.Java;

import java.util.Scanner;

public class Application2 {
    public static void main(String[] args) {
        /* 정수를 입력 받아 그 수가 짝수인지 홀수인지 판단해서 결과를 출력하세요
         * 짝수인 경우 "짝수다." 출력, 홀수인 경우 "홀수다." 출력
         *
         * -- 입력 예시 --
         * 정수를 하나 입력하세요 : 5
         *
         * -- 출력 예시 --
         * 홀수다.
         * */

        System.out.println("하나의 정수를 입력해보세요 :)");
        Scanner scan = new Scanner(System.in);
        int number = scan.nextInt();

        if (number % 2 != 0) {
            System.out.println("홀수다.");
        } else {
            System.out.println("짝수다.");
        }
    }
}
