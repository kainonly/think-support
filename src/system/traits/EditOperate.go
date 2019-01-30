package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type EditOperate struct{}

func (r *EditOperate) PostEdit() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
