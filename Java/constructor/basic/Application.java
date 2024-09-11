package question.constructor.basic;

public class Application {
    public static void main(String[] args) {

        MemberDTO dto = new MemberDTO();
        System.out.println("id : " + dto.getId());
        System.out.println("password : " + dto.getPwd());
        System.out.println("name : " + dto.getName());
        System.out.println("age : " + dto.getAge());
        System.out.println("gender : " + dto.getGender());
        System.out.println("phone : " + dto.getPhone());
        System.out.println("email : " + dto.getEmail());
        System.out.println("===============================");

        dto.setId("user01");
        dto.setPwd("pass01");
        dto.setName("홍길동");
        dto.setAge(20);
        dto.setGender('M');
        dto.setPhone("010-1234-5678");
        dto.setEmail("hong123@greedy.com");

        System.out.println("변경 후 : " + dto.getId());
        System.out.println("변경 후 : " + dto.getPwd());
        System.out.println("변경 후 : " + dto.getName());
        System.out.println("변경 후 : " + dto.getAge());
        System.out.println("변경 후 : " + dto.getGender());
        System.out.println("변경 후 : " + dto.getPhone());
        System.out.println("변경 후 : " + dto.getEmail());

    }
}
