package question.Java;

import java.util.Scanner;

public class Application3 {
    public static void main(String[] args) {
        /* 1~10 사이의 정수 한개를 입력받아 홀수인지 짝수인지 인지 확인하고,
         * 홀수이면 "홀수다.", 홀수가 아니면 "짝수다." 라고 출력하세요.
         * 단, 1~10 사이의 정수가 아닌 경우 "반드시 1~10 사이의 정수를 입력해야 합니다." 를 출력하세요.
         * */

        System.out.println("1 ~ 10 사이의 정수를 입력하시오.");
        Scanner scanz = new Scanner(System.in);
        int number = scanz.nextInt();

        if (number %2 != 0 && number > 0 && number < 10) {
            System.out.println("홀수다.");
        }
        else if (number > 0 && number < 10) { // 여기엔 number %2 = 0을 넣을 필요가 없다. 위 if에 이미 반대상황이 되므로 포함하지 않아도 됨
            System.out.println("짝수다.");
        }
        else {
            System.out.println("반드시 1 ~ 10 사이의 정수를 입력해야 합니다.");
        }
    }
}
