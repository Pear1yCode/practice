package Java.testQuestion.team.question;

import java.util.Scanner;

public class tree {
    public void makeTree() {
        System.out.print("트리 만들기 : ");
        Scanner sc = new Scanner(System.in);
        int tree = sc.nextInt();
        String trees = "*";
        
        // 기존에 만들었던 필요없는 부분을 제거하고 가장 최적화 됐다고 생각함
        // 더 최적화가 될 수 있을 것 같기는 한데 일단 이정도
        for (int i = 1; i < tree; i++) {
//            System.out.println(" ");    // 필요가 없어 제거  // 각 위치에 알파벳 하나씩 다르게 넣고 테스트 해보면 이해가 잘감
            for (int j = tree - i; j > 0 ; j--) {
            System.out.print(" ");   // 이게 핵심 // 각 위치에 알파벳 하나씩 다르게 넣고 테스트 해보면 이해가 잘감
        }
        System.out.println(trees);
        trees += "**";
        }
    }
}
