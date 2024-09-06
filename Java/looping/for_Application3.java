package question.Java.looping;

import java.util.Scanner;

public class for_Application3 {

    public void allPlus () {
        /* 1부터 입력받은 정수까지의 짝수의 합을 구하세요
         *
         * -- 입력 예시 --
         * 정수를 입력하세요 : 10
         *
         * -- 출력 예시 --
         * 1부터 10까지 짝수의 합 : 30
         * */
        System.out.print("정수를 입력하세요 : ");
        int sum = 0;
        Scanner sc = new Scanner(System.in);
        int gj = sc.nextInt();
        for(int i = 1; i <= gj; i++) {
            if(i % 2 == 0) {
                sum += i; // for을 또 써야하는줄 알고 돌아갔지만 if를 쓰니 쉽게 해결됐다.
            }
        }
        System.out.println("1부터 " + gj + "까지 짝수의 합 : " + sum);
    }
}
