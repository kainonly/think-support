package traits

import (
	"github.com/kataras/iris"
	"github.com/kataras/iris/mvc"
)

type GetOperate struct{}

func (r *GetOperate) PostGet() mvc.Result {
	return mvc.Response{
		Object: iris.Map{"error": 0},
	}
}
