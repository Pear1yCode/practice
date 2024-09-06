package question.Java.looping;

import java.util.Scanner;

public class for_Application2 {
    public void allPlus() {
        /* 정수 한 개를 입력 받고, 1부터 입력 받은 정수까지의 합을 계산해서 출력하세요
         *
         * -- 입력 예시 --
         * 정수를 입력하세요 : 5
         *
         * -- 출력 예시 --
         * 1부터 5까지의 합 : 15
         *
         * */

        System.out.print("정수를 입력하세요 : ");
        Scanner sc = new Scanner(System.in);
        int question = sc.nextInt();
        int plus = 0;

        for (int i = 1; i < question+1 ; i++) {
            plus += i;
        }
        System.out.println("1부터 " + question + " 까지의 합 : " + plus);
    }
}
