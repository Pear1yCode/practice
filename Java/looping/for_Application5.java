package question.Java.looping;

public class for_Application5 {
    public void allPlus () {
        /* 반복문을 이용하여 알파벳 소문자 'a'부터 'z'까지를 개행 없이 차례로 출력하세요
         *
         * -- 출력 예시 --
         * abcdefghijklmnopqrstuvwxyz
         * */

        for (char i = 97; i <= 122 ; i ++) { // 이 부분은 평소 int가 아닌 char로 치환해서 유니코드를 나타나게 했다.
            System.out.print(i); // println에서 ln만 빼면 되는 간단한 문제
        }
    }
}
