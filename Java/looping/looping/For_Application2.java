package Java.testQuestion.looping;

import java.util.Scanner;

public class For_Application2 {
    public void fw() {
        System.out.print("문자열 입력 : ");
        Scanner sc = new Scanner(System.in);
        String cho = sc.next();

        System.out.println("========== while 문 ==========");
            int index = 0;
            while (index < cho.length()) {
                char ch = cho.charAt(index);

                index++;
            }
        System.out.println(cho.charAt(0));
        System.out.println((char)cho.charAt(0) + "" + (char)cho.charAt(1)); // char를 넣어도 +가 들어가면 int 형태로 나타나서 중간에 빈공간을 넣어 해결했다.
        System.out.println((char)cho.charAt(0) + "" + (char)cho.charAt(1) + (char)cho.charAt(2)); //(char)을 사용해도 의미가 없어 제거
        System.out.println((char)cho.charAt(0) + "" + cho.charAt(1) + cho.charAt(2) + cho.charAt(3)); // 처음에 배운것처럼 가장 앞이 문자열로 취급되면서 전부 문자열로 나타남
        System.out.println((char)cho.charAt(0) + "" + cho.charAt(1) + cho.charAt(2) + cho.charAt(3) + cho.charAt(4)); // 처음에 배운 부분의 응용에서 깨달은 바가 있었다.
        System.out.println((char)cho.charAt(0) + "" + (char)cho.charAt(1) + (char)cho.charAt(2) + (char)cho.charAt(3) + (char)cho.charAt(4)); // 의미없음을 확인하기 위해 추가

        // 이 방식이 아닌 다른 방식으로 할 수 있는 방법도 존재(Substring)했다.
        System.out.println(cho.charAt(0));
        System.out.println(cho.substring(0,2));
        System.out.println(cho.substring(0,3));
        System.out.println(cho.substring(0,4));
        System.out.println(cho.substring(0,5));

        // 처음에는 이렇게 했으나 다만 이렇게 할 경우 5번 인덱스까지만 사용할 수 있다는 단점이 존재하여 이 부분에 for이나 while문을 대입하면 좋지 않을까 생각했다.
        }

        // 여러가지로 고안해봤으나 가장 유사하게 된 부분은 이 부분이다. substring 부분에 i를 넣으니 잘 해결됐다.
        // 여행갔다와서 그런지 혼동이 많았으나 substring이라는 명령어로 해결했지만 다른 분들께서 어떻게 했을지 굉장히 궁금했다.
        // (substring을 몰랐을 때와 노가다로 만들때까지 3-4시간은 고민한 것 같다..ㅠ 많이 부족하다 !)
        public void fwImprovement () {
            System.out.print("문자열 입력 : ");
            Scanner sc = new Scanner(System.in);
            String cho = sc.nextLine();

            for (int i = 0; i <= cho.length(); i++) {
                System.out.println(cho.substring(0,i));
                }
            }
        }